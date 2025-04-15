# Simple System for tracking decor pieces
Simple system for tracking decor pieces using QR codes. The system allows users to generate QR codes for each decor piece, which can be scanned to retrieve information about the piece. Also, the system generates a document for registering that the decor piece was sent to an event.

I initially tried to manage to use php+python together. In that case, I was using python for backend services, like generating QR codes and php to handle pages. Unfortunately I couldn't manage to make it work, so I decided to migrate to use only python+flask.

## TODO
- [X] Create database
- [X] Generate random code for qrcode
- [X] Generate random qrcode
- [X] Output qrcode img to desktop (not needed anymore)
- [X] Output qrcode img to page (downloadable)
- [X] Store qrcode in database
- [X] Create a page for creating qrcode
- [ ] Add decor piece to database and link to qrcode
- [ ] Read a qrcode and register the piece with that qrcode
- [ ] Read a qrcode and retrieve decor piece information
- [ ] Cart-like system for adding decor pieces to an event
- [ ] Generate a report of decor pieces that went to an event
- [ ] Generate a report of decor pieces that were returned from an event

## Might Add
- [ ] Unit tests
- [ ] Catalog view of pieces (See all pieces)
