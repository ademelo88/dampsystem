const form=document.getElementById('checklist-form');
const logEl=document.getElementById('log');
document.getElementById('sync').addEventListener('click',syncNow);

form.addEventListener('submit', async (e)=>{
  e.preventDefault();
  const rec={
    job_id: document.getElementById('job_id').value,
    step: document.getElementById('step').value,
    notes: document.getElementById('notes').value,
    created_at: new Date().toISOString()
  };
  await window.damsIDB.addRecord(rec);
  log('Saved offline: '+JSON.stringify(rec));
  form.reset();
});

async function syncNow(){
  const batch=await window.damsIDB.getAll();
  if(!batch.length){ log('Nothing to sync.'); return; }
  try{
    const res=await fetch('/api/tech/sync',{
      method:'POST',
      headers:{'Content-Type':'application/json'},
      body: JSON.stringify({records: batch})
    });
    if(!res.ok) throw new Error('Sync failed '+res.status);
    await window.damsIDB.clearAll();
    log('Synced '+batch.length+' records.');
  }catch(err){
    log('Sync error: '+err.message);
  }
}
function log(msg){ logEl.textContent += msg+'\n'; }
