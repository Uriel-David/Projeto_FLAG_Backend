window.onload = () => {
    const btnDarkMode   = document.getElementById('button-dark-mode');
    const btnUpdateUser = document.getElementById('btn-update-user');

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

    const hideOrShow = (elementShow, elementHide) => {
        const elementDisplay = document.getElementById(elementShow);
        const elementHidden = document.getElementById(elementHide);

        if(elementDisplay.classList.contains('hide')) {
            elementDisplay.classList.remove('hide');
            elementHidden.classList.add('hide');
        } else {
            elementDisplay.classList.add('hide');
            elementHidden.classList.remove('hide');
        }
    };

    btnUpdateUser.addEventListener("click", () => {
        hideOrShow('data-list-user', 'form-update-user');
        btnUpdateUser.innerText = btnUpdateUser.innerText === 'Update Info' ? 'Get Info' : 'Update Info';
    });
};