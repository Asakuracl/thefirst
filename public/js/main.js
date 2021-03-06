class moveEffect {
    constructor() {
        this.navbarLi = document.getElementsByClassName("navbar-li");
        this.window = window;
        this.navbarColors = document.getElementsByClassName("navbar-span-2");
        this.accordion = document.querySelector(".accordion");
        this.postView = document.querySelector(".postView-comment-div");
        this.minus = document.querySelector(".fa-plus");

        this.getBurger = document.querySelector("#burger");

        this.topButton = document.querySelector("#topButton");
        this.up = document.querySelector("header");

        //listener
        this.getBurger.addEventListener("click", this.openMenu.bind(this));
        this.window.addEventListener("scroll", this.navbarChange.bind(this));
        this.window.addEventListener("scroll", this.pop.bind(this));
        this.topButton.addEventListener("click", this.top.bind(this));
        this.accordion.addEventListener("click", this.commentOpen.bind(this));
    }

    navbarChange() {
        for (let navbarLi of this.navbarLi) {
            if (document.documentElement.scrollTop > 50) {
                navbarLi.classList.add("shrink");
            } else {
                navbarLi.classList.remove("shrink");
            }
        }

        for (let navbarColor of this.navbarColors) {
            if (document.documentElement.scrollTop > 50) {
                navbarColor.style.background = "linear-gradient(145deg, orange 0%, orangered 100%)";
            } else {
                navbarColor.style.background = "linear-gradient(145deg, white 0%, orange 50%)";
            }
        }
    }

    pop() {
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            this.topButton.style.display = "block";
        } else {
            this.topButton.style.display = "none";
        }
    }

    top() {
        this.up.scrollIntoView({
            behavior: 'smooth'
        });
    }

    commentOpen() {
        this.accordion.classList.toggle('is-open');

        if (this.accordion.classList.contains('is-open')) {
            this.postView.style.height = this.postView.scrollHeight + "px";
            this.minus.classList.remove("fa-plus");
            this.minus.classList.add("fa-minus");
        } else {
            this.postView.style.height = '0';
            this.minus.classList.remove("fa-minus");
            this.minus.classList.add("fa-plus");
        }
    }

    openMenu() {
        this.getBurger.classList.toggle('animate');
        this.getBurger.classList.toggle('move');
    }

}

const move = new moveEffect();