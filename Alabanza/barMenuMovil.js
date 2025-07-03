(function () {
    // Propiedades Menu
    var propMenuMovil = {
        burger_menu: document.getElementById('burger_menu'),
        slide_menu: document.getElementById('slide_menu'),
        menu_active: false,
        elementos: document.querySelectorAll('#slide_menu .bar-nav ul li'),
    };

    // Metodos Menu

    var metMenuMovil = {
        inicio: function () {
            propMenuMovil.burger_menu.addEventListener(
                'click',
                metMenuMovil.toggleMenu
            );

            for (var i = 0; i < propMenuMovil.elementos.length; i++) {
                if (propMenuMovil.elementos[i].classList.contains('dropdown')) {
                    document
                        .querySelectorAll('#dropdown-content a')
                        .forEach((element) => {
                            element.addEventListener(
                                'click',
                                metMenuMovil.ocultarMenu
                            );
                        });
                } else {
                    propMenuMovil.elementos[i].addEventListener(
                        'click',
                        metMenuMovil.ocultarMenu
                    );
                }
            }
        },
        toggleMenu: function () {
            if (propMenuMovil.menu_active === false) {
                propMenuMovil.menu_active = true;
                propMenuMovil.slide_menu.className += ' active';
            } else {
                propMenuMovil.menu_active = false;
                propMenuMovil.slide_menu.className =
                    propMenuMovil.slide_menu.className.replace(' active', '');
            }
        },
        ocultarMenu: function (event) {
            propMenuMovil.menu_active = false;
            propMenuMovil.slide_menu.className =
                propMenuMovil.slide_menu.className.replace(' active', '');
        },
    };
    metMenuMovil.inicio();
})();
