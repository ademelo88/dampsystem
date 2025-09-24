# Data Model (Key Entities)

- User (RBAC via spatie/laravel-permission)
- Contact (customer/landlord/agent)
- Organisation
- Property
- Lead
- Survey (room-by-room, readings, media)
- Quote (versions, options G/B/B, line items)
- Assembly (BOM, labour)
- Job (schedule, crew, checklists, RAMS)
- PurchaseOrder (supplier, items, status)
- Invoice / Payment
- Document (S3/MinIO)
- Message (threads)
- Asset / Inventory
- Vehicle / Plant
- Timesheet
- IntegrationToken

> See migrations once Laravel app is generated via `scripts/setup.sh`.
