document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input');
    const projectContainer = document.querySelector(".projects");
    const categoryButtons = document.querySelectorAll('.button');

    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            const categoryText = this.innerText;
            searchInput.value = categoryText;
            searchProjects(categoryText);
        });
    });

    searchInput.addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            searchProjects(this.value);
        }
    });

    function searchProjects(searchValue) {
        const data = { search: searchValue };

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (projects) {
            projectContainer.innerHTML = "";
            loadProjects(projects);
        });
    }

    function loadProjects(projects) {
        projects.forEach(project => {
            createProject(project);
        });
    }

    function createProject(project) {
        const template = document.querySelector("#project-template");
        const clone = template.content.cloneNode(true);

        const div = clone.querySelector("div");
        div.id = project.id_song;

        const title = clone.querySelector("h2");
        title.innerHTML = project.title;

        const description = clone.querySelector(".description");
        description.innerHTML = project.artist_name;

        const category = clone.querySelector(".category");
        category.innerText = project.category_name;

        projectContainer.appendChild(clone);
    }
});


function loadProjects(projects) {
    projects.forEach(project =>{
        console.log(project);
        createProject(project);
    });
}

function createProject(project) {
    const template = document.querySelector("#project-template");
    const clone = template.content.cloneNode(true);

    const div = clone.querySelector("div");
    div.id = project.id_song;

    const title = clone.querySelector("h2");
    title.innerHTML = project.title;

    const description = clone.querySelector(".description");
    description.innerHTML = project.artist_name;

    const category = clone.querySelector(".category");
    category.innerText = project.category_name;

    projectContainer.appendChild(clone);
}
