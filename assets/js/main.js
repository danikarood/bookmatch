//Signup page js
function togglePassword(inputId, btnElement) {
    const input = document.getElementById(inputId);
    const icon = btnElement.querySelector('i');
    
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    }
}

//Login page js

document.addEventListener('DOMContentLoaded', () => {
    // Handle interactive bookmark toggling across book items
    const bookmarks = document.querySelectorAll('.fa-bookmark');
    bookmarks.forEach(bookmark => {
        bookmark.addEventListener('click', (e) => {
            e.stopPropagation();
            if (bookmark.classList.contains('fa-regular')) {
                bookmark.classList.remove('fa-regular');
                bookmark.classList.add('fa-solid');
                bookmark.style.color = '#C18844';
            } else {
                bookmark.classList.remove('fa-solid');
                bookmark.classList.add('fa-regular');
                bookmark.style.color = 'inherit';
            }
        });
    });

    // Custom website-matching modal handlers for "Why this book?"
    const whyBtn = document.querySelector('.btn-why');
    const modalOverlay = document.getElementById('why-modal-overlay');
    const modalOkBtn = document.getElementById('modal-ok-btn');

    if (whyBtn && modalOverlay) {
        whyBtn.addEventListener('click', () => {
            modalOverlay.classList.add('active');
        });
    }

    if (modalOkBtn && modalOverlay) {
        modalOkBtn.addEventListener('click', () => {
            modalOverlay.classList.remove('active');
        });
    }

    // Close modal when clicking outside the card box
    if (modalOverlay) {
        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                modalOverlay.classList.remove('active');
            }
        });
    }
});

// Discover page js
document.addEventListener('DOMContentLoaded', () => {
    // Enable horizontal scrolling interaction enhancement for book rows if needed
    const bookRows = document.querySelectorAll('.book-row-netflix');

    bookRows.forEach(row => {
        row.addEventListener('wheel', (evt) => {
            if (evt.deltaY !== 0) {
                evt.preventDefault();
                row.scrollLeft += evt.deltaY;
            }
        });
    });

    // Handle interactive search focus states or simple validation
    const searchInputs = document.querySelectorAll('.discover-search-bar input');
    searchInputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.style.borderColor = '#C18844';
        });
        input.addEventListener('blur', () => {
            input.style.borderColor = '#ddd';
        });
    });
});

//Community/ recommended books page js
