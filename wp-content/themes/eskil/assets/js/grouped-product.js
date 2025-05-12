document.addEventListener("DOMContentLoaded", function () {
  const groupedProductCard = document.querySelector(".grouped-product-card");
  if (groupedProductCard) {
    const buttonContainer = document.querySelector(".button-container");
    const modal = document.querySelector(".modal");
    const modalImage = document.querySelector(".modal-img");
    const closeOverlay = document.querySelector(".overlay");
    const prevBtn = document.querySelector(".prev");
    const nextBtn = document.querySelector(".next");

    const fabricBlocks = document.querySelectorAll(".fabric");

    let currentIndex = 0;

    // Показати модалку з картинкою по індексу
    function openModal(index) {
      const img = fabricBlocks[index].querySelector("img");
      modalImage.src = img.src;
      modal.classList.remove("hidden");

      // Додати клас .fabric-chosen тільки активному
      fabricBlocks.forEach((block) => block.classList.remove("fabric-chosen"));
      fabricBlocks[index].classList.add("fabric-chosen");

      currentIndex = index;
    }

    // Закрити модалку
    function closeModal() {
      modal.classList.add("hidden");
    }

    // Обробка кліку на блоки
    fabricBlocks.forEach((fabric, index) => {
      fabric.addEventListener("click", function () {
        openModal(index);
      });
    });

    // Стрілка "назад"
    prevBtn.addEventListener("click", function (e) {
      e.stopPropagation(); // Щоб клік не закривав модалку
      currentIndex =
        (currentIndex - 1 + fabricBlocks.length) % fabricBlocks.length;
      openModal(currentIndex);
    });

    // Стрілка "вперед"
    nextBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      currentIndex = (currentIndex + 1) % fabricBlocks.length;
      openModal(currentIndex);
    });

    // Закриття при кліку на overlay
    closeOverlay.addEventListener("click", function () {
      closeModal();
    });

    buttonContainer.addEventListener("click", (e) => {
      const clickedBtn = e.target.closest(".step-one-btn");

      if (!clickedBtn) return;

      const allButtons = buttonContainer.querySelectorAll(".step-one-btn");
      allButtons.forEach((btn) => btn.classList.remove("pressed-btn"));

      clickedBtn.classList.add("pressed-btn");
    });
  }
});
