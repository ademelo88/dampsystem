// Minimal IndexedDB wrapper (same as earlier detailed version)
const DB_NAME='dams-tech', STORE='checklist';
function openDB(){
  return new Promise((res, rej)=>{
    const req=indexedDB.open(DB_NAME,1);
    req.onupgradeneeded=e=>{
      const db=e.target.result;
      if(!db.objectStoreNames.contains(STORE)){
        db.createObjectStore(STORE,{keyPath:'id',autoIncrement:true});
      }
    };
    req.onsuccess=e=>res(e.target.result);
    req.onerror=e=>rej(e.target.error);
  });
}
async function addRecord(rec){
  const db=await openDB();
  return new Promise((res, rej)=>{
    const tx=db.transaction(STORE,'readwrite');
    tx.objectStore(STORE).add(rec);
    tx.oncomplete=()=>res(true);
    tx.onerror=e=>rej(e.target.error);
  });
}
async function getAll(){
  const db=await openDB();
  return new Promise((res, rej)=>{
    const tx=db.transaction(STORE,'readonly');
    const req=tx.objectStore(STORE).getAll();
    req.onsuccess=()=>res(req.result||[]);
    req.onerror=e=>rej(e.target.error);
  });
}
async function clearAll(){
  const db=await openDB();
  return new Promise((res, rej)=>{
    const tx=db.transaction(STORE,'readwrite');
    tx.objectStore(STORE).clear();
    tx.oncomplete=()=>res(true);
    tx.onerror=e=>rej(e.target.error);
  });
}
window.damsIDB={addRecord,getAll,clearAll};
