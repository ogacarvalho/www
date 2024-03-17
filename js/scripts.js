function showDescription(circle) {
    
    var descriptionBox = circle.nextElementSibling;
    if (descriptionBox.style.display === "none") {
        descriptionBox.style.display = "block";
    } else {
        descriptionBox.style.display = "none";
    }
}

function addCircle(event, carouselItem) {
    var xPos = event.offsetX;
    var yPos = event.offsetY;

    var userText = prompt("Por favor, insira sua frase personalizada para esta imagem:", "Descrição da imagem");
    if (userText === null || userText === "") {
        return;
    }

    var circle = document.createElement('div');
    circle.className = 'circle';
    circle.style.left = xPos + 'px';
    circle.style.top = yPos + 'px';

    var descriptionBox = document.createElement('div');
    descriptionBox.className = 'description-box';
    descriptionBox.style.display = 'none';
    descriptionBox.textContent = userText;

    descriptionBox.style.left = (xPos + 50) + 'px';
    descriptionBox.style.top = yPos + 'px';

    circle.onclick = function() {
        if (descriptionBox.style.display === "none") {
            descriptionBox.style.display = "block";
        } else {
            descriptionBox.style.display = "none";
        }
    };

    carouselItem.appendChild(circle);
    carouselItem.appendChild(descriptionBox);
    carouselItem.querySelector('img').onclick = null;
}

function enableCircleAdding(button) {
    var container = button.closest('.container');
    var img;
    // Tenta encontrar um ancestral do botão que seja um item de carrossel
    var carouselItem = button.closest('.carousel-item');
    
    if (carouselItem) {
        // Se encontrou um item de carrossel, pega a imagem dele
        img = carouselItem.querySelector('img');
    } else {
        // Se não, pega a imagem única
        img = container.querySelector('img');
    }

    // Adiciona o evento de clique para adicionar um círculo
    img.onclick = function(event) {
        addCircle(event, img.parentElement);
    };

    // Remove o listener anterior para evitar múltiplas chamadas
    button.onclick = null;
}

document.addEventListener('DOMContentLoaded', (event) => {
    // Verifica se o botão de upload existe antes de adicionar o manipulador de clique
    var uploadBtn = document.querySelector('.custom-file-upload');
    if (uploadBtn) {
        uploadBtn.onclick = function() {
            document.getElementById('file-upload').click();
        };
    }

    // Detecta quando um arquivo é selecionado no input
    var fileInput = document.getElementById('file-upload');
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            // Verifica se algum arquivo foi selecionado
            if (this.files.length > 0) {
                // Submete o formulário automaticamente
                this.form.submit();
            }
        });
    }
});
