document.addEventListener("DOMContentLoaded", () => {
    // Selección de elementos
    const sliderWrapper = document.querySelector(".new-slider-wrapper");
    const slides = document.querySelectorAll(".new-slide");
    const prevButton = document.querySelector(".new-slider-control.prev");
    const nextButton = document.querySelector(".new-slider-control.next");
    const indicators = document.querySelectorAll(".new-indicator");

    let currentIndex = 0;
    const totalSlides = slides.length;

    // Función para actualizar el slider
    const updateSlider = (index) => {
        // Cambiar la posición del wrapper
        sliderWrapper.style.transform = `translateX(-${index * 100}%)`;

        // Actualizar indicadores
        indicators.forEach((indicator, i) => {
            indicator.classList.toggle("active", i === index);
        });
    };

    // Función para navegar al siguiente slide
    const nextSlide = () => {
        currentIndex = (currentIndex + 1) % totalSlides; // Volver al inicio al llegar al final
        updateSlider(currentIndex);
    };

    // Función para navegar al slide anterior
    const prevSlide = () => {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides; // Ir al final al retroceder desde el inicio
        updateSlider(currentIndex);
    };

    // Evento para el botón "Siguiente"
    nextButton.addEventListener("click", nextSlide);

    // Evento para el botón "Anterior"
    prevButton.addEventListener("click", prevSlide);

    // Eventos para los indicadores
    indicators.forEach((indicator, index) => {
        indicator.addEventListener("click", () => {
            currentIndex = index;
            updateSlider(currentIndex);
        });
    });

    // Opcional: Auto reproducción del slider
    setInterval(nextSlide, 10000); // Cambiar cada 5 segundos
});
