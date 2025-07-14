document.addEventListener("DOMContentLoaded", function () {

  // dropdown nav
  const chevronToggle = document.getElementById("chevronToggle");
  const dropdownMenu = document.getElementById('dropdownMenu');

    if (chevronToggle && dropdownMenu) {
      chevronToggle.addEventListener("click", (e) => {
        e.stopPropagation();
        dropdownMenu.classList.toggle("hidden");
      });

      document.addEventListener("click", (e) => {
        if (!dropdownMenu.contains(e.target) && !chevronToggle.contains(e.target)) {
          dropdownMenu.classList.add("hidden");
        }
      });
    }

  // Password toggle
  const togglePassword = document.getElementById("togglePassword");
  const password = document.getElementById("password");
  const eyeIcon = document.getElementById("eyeIcon");
  const eyeSlashIcon = document.getElementById("eyeSlashIcon");

  if (togglePassword && password) {
    togglePassword.addEventListener("click", function () {
      const isPassword = password.getAttribute("type") === "password";
      password.setAttribute("type", isPassword ? "text" : "password");

      // Toggle icons
      if (eyeIcon && eyeSlashIcon) {
        eyeIcon.classList.toggle("hidden", isPassword);
        eyeSlashIcon.classList.toggle("hidden", !isPassword);
      }
    });
  }

  // confirm password toggle
  const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
  const confirmPassword = document.getElementById("password_confirmation");
  const eyeIconConfirm = document.getElementById("eyeIconConfirm");
  const eyeSlashIconConfirm = document.getElementById("eyeSlashIconConfirm");

  if (toggleConfirmPassword && confirmPassword) {
    toggleConfirmPassword.addEventListener("click", function () {
      const isPassword = confirmPassword.getAttribute("type") === "password";
      confirmPassword.setAttribute("type", isPassword ? "text" : "password");

      // Toggle icons
      if (eyeIconConfirm && eyeSlashIconConfirm) {
        eyeIconConfirm.classList.toggle("hidden", isPassword);
        eyeSlashIconConfirm.classList.toggle("hidden", !isPassword);
      }
    });
  }

  //  Forgot password form
  const forgotForm = document.getElementById("forgot-password-form");
  const successMessage = document.getElementById("success-message");

  if (forgotForm && successMessage) {
    forgotForm.addEventListener("submit", function (e) {
      e.preventDefault(); // prevent actual form submission

      // Hide form and show message
      forgotForm.classList.add("hidden");
      successMessage.classList.remove("hidden");
    });
  }

  const profilePictureInput = document.getElementById('profile_picture');
  const previewImage = document.getElementById('preview');

  if (profilePictureInput && previewImage) {
    profilePictureInput.addEventListener('change', function (event) {
      const [file] = event.target.files;
      if (file) {
        previewImage.src = URL.createObjectURL(file);
      }
    });
  }

  const toggleBtn = document.getElementById('toggleMoreOptions');
  const optionsList = document.getElementById('moreOptionsList');
  const arrow = document.getElementById('moreOptionsArrow');

  if (toggleBtn && optionsList && arrow) {
    toggleBtn.addEventListener('click', function () {
      const isHidden = optionsList.classList.contains('hidden');

      if (isHidden) {
        optionsList.classList.remove('hidden');
        arrow.classList.add('rotate-180');
      } else {
        optionsList.classList.add('hidden');
        arrow.classList.remove('rotate-180');
      }
    });
  }
  const fileInput = document.getElementById('image_url');
  const cropperImage = document.getElementById('cropperImage');
  const croppedPreview = document.getElementById('croppedPreview');
  const dropzoneText = document.getElementById('dropzoneText');
  const cropButton = document.getElementById('cropButton');
  const changeImageBtn = document.getElementById('changeImageBtn');
  const croppedImageInput = document.getElementById('croppedImageData');

  let cropper = null;

  if (fileInput && cropperImage && croppedPreview) {
    changeImageBtn.addEventListener('click', () => {
      fileInput.click();
    });

    fileInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = (e) => {
        cropperImage.src = e.target.result;
        cropperImage.classList.remove('hidden');
        dropzoneText?.classList.add('hidden');
        cropButton.classList.remove('hidden');
        cropButton.textContent = 'Crop Image';
        croppedPreview.classList.add('hidden'); // Hide preview until cropped again

        

        if (cropper) cropper.destroy();

        cropper = new Cropper(cropperImage, {
          aspectRatio: 16 / 9,
          viewMode: 1,
          dragMode: 'move',
          autoCropArea: 1,
        });
      };

      reader.readAsDataURL(file);
    });

    cropButton.addEventListener('click', () => {
      if (cropButton.textContent === 'Crop Again') {
      // Show cropper image again to allow re-cropping
      cropperImage.classList.remove('hidden');
      croppedPreview.classList.add('hidden');
        // Reinitialize cropper
          if (cropper) cropper.destroy();
          cropper = new Cropper(cropperImage, {
            aspectRatio: 16 / 9,
            viewMode: 1,
            dragMode: 'move',
            autoCropArea: 1,
          });

          cropButton.textContent = 'Crop Image';
          return;
      }


      if (!cropper) return;

      const canvas = cropper.getCroppedCanvas({
        width: 1280,
        height: 720,
        fillColor: '#fff',
      });

      if (!canvas) {
        alert("Cropping failed.");
        return;
      }

      // Show cropped image in place
      canvas.toBlob((blob) => {
        if (!blob) return;

        const previewUrl = URL.createObjectURL(blob);
        croppedPreview.src = previewUrl;
        croppedPreview.classList.remove('hidden');
        cropperImage.classList.add('hidden');

        // Put the blob as the new file in the input
        const file = new File([blob], 'cropped.jpg', { type: 'image/jpeg' });
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        fileInput.files = dataTransfer.files;

        // Optional: store as base64 in hidden input (if needed)
        // const reader = new FileReader();
        // reader.onloadend = () => {
        //   croppedImageInput.value = reader.result;
        // };
        // reader.readAsDataURL(blob);

        // // Optionally destroy cropper if cropping is done
        // cropper.destroy();
        // cropper = null;

        cropButton.textContent = 'Crop Again';
      }, 'image/jpeg');
    });
  }

  
  // faq
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach(item => {
    const questionBtn = item.querySelector('.faq-question');
    const answerDiv = item.querySelector('.faq-answer');
    const arrowIcon = item.querySelector('.faq-arrow');

    questionBtn.addEventListener('click', () => {
      faqItems.forEach(otherItem => {
        const otherAnswer = otherItem.querySelector('.faq-answer');
        const otherArrow = otherItem.querySelector('.faq-arrow');
        if (otherItem !== item) {
          otherAnswer.classList.add('hidden');
          otherArrow.style.transform = 'rotate(0deg)';
        }
      });

      const isOpen = !answerDiv.classList.contains('hidden');
      if (isOpen) {
        answerDiv.classList.add('hidden');
        arrowIcon.style.transform = 'rotate(0deg)';
      } else {
        answerDiv.classList.remove('hidden');
        arrowIcon.style.transform = 'rotate(180deg)';
      }
    });
  });

  
});