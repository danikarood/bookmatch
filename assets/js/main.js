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

//Hidden Librarry Page js
// --- THE MERIDIAN ARCHIVE GENRE FILTERING ---
document.addEventListener('DOMContentLoaded', () => {
    const genreButtons = document.querySelectorAll('.genre-btn');
    const archiveCards = document.querySelectorAll('.archive-card');

    if (genreButtons.length > 0 && archiveCards.length > 0) {
        genreButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                genreButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');

                const selectedGenre = button.getAttribute('data-genre');

                archiveCards.forEach(card => {
                    const cardGenre = card.getAttribute('data-genre');
                    if (selectedGenre === 'all' || cardGenre === selectedGenre) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }
});

//reading list page js

const libraryData = {
    continueReading: [
        {
            title: "Fourth Wing",
            author: "Rebecca Yarros",
            progress: 68,
            cover: "https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "The Song of Achilles",
            author: "Madeline Miller",
            progress: 42,
            cover: "https://images.unsplash.com/photo-1512820790803-83ca734da794?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "A Court of Thorns and Roses",
            author: "Sarah J. Maas",
            progress: 25,
            cover: "https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "The Seven Husbands of Evelyn Hugo",
            author: "Taylor Jenkins Reid",
            progress: 71,
            cover: "https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "The Atlas Six",
            author: "Olivie Blake",
            progress: 15,
            cover: "https://images.unsplash.com/photo-1532012197267-da84d127e765?w=300&auto=format&fit=crop&q=80"
        }
    ],
    wantToRead: [
        {
            title: "House of Earth and Blood",
            author: "Sarah J. Maas",
            cover: "https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "Iron Flame",
            author: "Rebecca Yarros",
            cover: "https://images.unsplash.com/photo-1524578271613-d550eacf6090?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "The Night Circus",
            author: "Erin Morgenstern",
            cover: "https://images.unsplash.com/photo-1519682337058-a94d519337bc?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "The Invisible Life of Addie LaRue",
            author: "V.E. Schwab",
            cover: "https://images.unsplash.com/photo-1528459801416-a9e53bbf4e17?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "Check & Mate",
            author: "Ali Hazelwood",
            cover: "https://images.unsplash.com/photo-1512820790803-83ca734da794?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "One Dark Window",
            author: "Rachel Gillig",
            cover: "https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w=300&auto=format&fit=crop&q=80"
        }
    ],
    finished: [
        {
            title: "It Ends With Us",
            author: "Colleen Hoover",
            rating: 5,
            cover: "https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "The Midnight Library",
            author: "Matt Haig",
            rating: 5,
            cover: "https://images.unsplash.com/photo-1532012197267-da84d127e765?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "The Fault in Our Stars",
            author: "John Green",
            rating: 5,
            cover: "https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "Verity",
            author: "Colleen Hoover",
            rating: 5,
            cover: "https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?w=300&auto=format&fit=crop&q=80"
        }
    ],
    collections: [
        {
            title: "All Time Favourites",
            count: "24 books",
            cover: "https://images.unsplash.com/photo-1524578271613-d550eacf6090?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "Fantasy Obsessions",
            count: "18 books",
            cover: "https://images.unsplash.com/photo-1519682337058-a94d519337bc?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "Romance Reads",
            count: "32 books",
            cover: "https://images.unsplash.com/photo-1528459801416-a9e53bbf4e17?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "To Read This Year",
            count: "15 books",
            cover: "https://images.unsplash.com/photo-1512820790803-83ca734da794?w=300&auto=format&fit=crop&q=80"
        }
    ],
    recentlyAdded: [
        {
            title: "Once Upon a Broken Heart",
            author: "Stephanie Garber",
            time: "Added 2 days ago",
            cover: "https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "The House in the Cerulean Sea",
            author: "TJ Klune",
            time: "Added 4 days ago",
            cover: "https://images.unsplash.com/photo-1512820790803-83ca734da794?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "Daisy Jones & The Six",
            author: "Taylor Jenkins Reid",
            time: "Added 1 week ago",
            cover: "https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?w=300&auto=format&fit=crop&q=80"
        },
        {
            title: "Lessons in Chemistry",
            author: "Bonnie Garmus",
            time: "Added 1 week ago",
            cover: "https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=300&auto=format&fit=crop&q=80"
        }
    ]
};

function renderContinueReading() {
    const container = document.getElementById('continue-reading-container');
    if (!container) return;

    container.innerHTML = libraryData.continueReading.map(book => `
        <div class="continue-card">
            <div class="book-cover-wrap">
                <img src="${book.cover}" alt="${book.title}">
                <button class="menu-dots"><i class="fa-solid fa-ellipsis-vertical"></i></button>
            </div>
            <div class="continue-info">
                <h4>${book.title}</h4>
                <p>${book.author}</p>
                <div class="progress-bar-container">
                    <div class="progress-fill" style="width: ${book.progress}%;"></div>
                </div>
                <div class="progress-text">${book.progress}%</div>
            </div>
        </div>
    `).join('');
}

function renderWantToRead() {
    const container = document.getElementById('want-to-read-container');
    if (!container) return;

    container.innerHTML = libraryData.wantToRead.map(book => `
        <div class="shelf-book">
            <img src="${book.cover}" alt="${book.title}">
        </div>
    `).join('');
}

function renderFinished() {
    const container = document.getElementById('finished-container');
    if (!container) return;

    container.innerHTML = libraryData.finished.map(book => `
        <div class="finished-card">
            <img src="${book.cover}" alt="${book.title}">
            <h4>${book.title}</h4>
            <p>${book.author}</p>
            <div class="stars">
                ${'<i class="fa-solid fa-star"></i>'.repeat(book.rating)}
            </div>
        </div>
    `).join('');
}

function renderCollections() {
    const container = document.getElementById('collections-container');
    if (!container) return;

    container.innerHTML = libraryData.collections.map(col => `
        <div class="collection-card">
            <div class="collection-img-wrap">
                <img src="${col.cover}" alt="${col.title}">
            </div>
            <div class="collection-info">
                <h4>${col.title}</h4>
                <p>${col.count}</p>
            </div>
        </div>
    `).join('');
}

function renderRecentlyAdded() {
    const container = document.getElementById('recently-added-container');
    if (!container) return;

    container.innerHTML = libraryData.recentlyAdded.map(item => `
        <div class="recent-item">
            <div class="recent-info-wrap">
                <img src="${item.cover}" alt="${item.title}">
                <div class="recent-details">
                    <h4>${item.title}</h4>
                    <p>${item.author}</p>
                    <span class="added-time">${item.time}</span>
                </div>
            </div>
        </div>
    `).join('');
}

document.addEventListener('DOMContentLoaded', () => {
    renderContinueReading();
    renderWantToRead();
    renderFinished();
    renderCollections();
    renderRecentlyAdded();
});