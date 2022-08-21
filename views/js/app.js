window.onload = () => {
    const btnDarkMode = document.getElementById('button-dark-mode');

    if (localStorage.getItem('mode-screen') === 'Dark Mode') {
        document.documentElement.classList.toggle('dark-mode');
        btnDarkMode.innerText = 'Light Mode';
    }

    btnDarkMode.addEventListener("click", () => {
        document.documentElement.classList.toggle('dark-mode');
        btnDarkMode.innerText = btnDarkMode.innerText === 'Dark Mode' ? 'Light Mode' : 'Dark Mode';
        
        if (btnDarkMode.innerText === 'Light Mode') {
            localStorage.setItem('mode-screen', 'Dark Mode')
        }

        if (btnDarkMode.innerText === 'Dark Mode') {
            localStorage.setItem('mode-screen', 'Light Mode')
        }
    });
};