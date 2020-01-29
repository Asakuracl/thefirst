class moveEffect {
    constructor() {
        this.navbarLi = document.getElementsByClassName("navbar-li");
        this.window = window;
        this.navbarColors = document.getElementsByClassName("navbar-span-1");
        this.accordion = document.getElementsByClassName(".accordion");
        this.postView = document.getElementsByClassName(".postView-comment-div");
        this.minus = document.querySelector(".fa-plus");

        //listener
        this.window.addEventListener("scroll", this.navbarChange.bind(this));

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
                navbarColor.style.backgroundColor = "#FF8A00";
            } else {
                navbarColor.style.backgroundColor = "orange";
            }
        }
    }
}

const move = new moveEffect();