// hold all pieces
const catalog = document.getElementById('catalog');

if (catalog) {
    async function loadCatalog() {

        const response = await fetch('/api/api_pieces.php');
        const pieces = await response.json();

        if (!pieces || pieces.length === 0) {
            catalog.innerHTML = '<p>Nenhuma peça foi encontrada no sistema.</p>';
            return;
        }

        for (const piece of pieces) {
            if (piece.isBroke) {
                continue;
            }

            const article = document.createElement('article');
            const img = document.createElement('img');
            img.src = '.' + piece.piece_photo;

            if (piece.isInEvent) {
                // colocar um efeito branquinho na foto e n add a anchor tag
                article.classList.add('in-event');
                article.appendChild(img);       // might be reductant, but ensure everything is working fine
            }
            else {
                const link = document.createElement('a');
                link.href = 'show_piece.php?qrcode=' + piece.qrcode;
                article.appendChild(link);
                link.appendChild(img);
            }

            catalog.appendChild(article);
        }
    }

    loadCatalog();
}