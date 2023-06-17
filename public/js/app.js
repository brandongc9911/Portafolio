const banner = document.querySelector("#banner")
const spanBanner = document.querySelector("#spanBanner")
const champiñon = document.querySelector("#champiñon")
const reload = document.querySelector("#reload")
const tecnologia = document.querySelector("#tecnologia")
const tecnologias = ['PHP', 'JS', 'HTML', 'CSS', 'MYSQL', 'FIREBASE', 'PYTHON', 'SASS']
const emojis = ['🤩', '🤗', '😁', '😎', '🤓', '👨‍💻']
const colores = ["#8B1874", "#B71375", "#FC4F00", "#F79540", "#9E6F21", "#FFEEB3", "#B8E7E1", "#FF6969",
    "#C9A7EB", "#05BFDB", "#00FFCA", "#088395"]
const circle = document.querySelectorAll(".circle")
const bibliografia = document.querySelector("#info_me-bibliografia")
const selected = document.querySelector(".selected")
const social = document.querySelectorAll(".social_icon");

let validador = true
const projects = {
    id: '',
    likes: ''
}



document.addEventListener("DOMContentLoaded", () => {
    if (banner) {
        bibliografia.innerText = "Estudie en la Universidad Tamaulipeca, donde exitosamente termine  la carrera de Ingeniería en Sistemas. Logré  la certificacion PCEP™ Certified Entry-Level Python Programmer de Python Institute"
        banner.style.backgroundColor = aleatorio(colores)
        spanBanner.style.color = banner.style.backgroundColor
        selected.style.backgroundColor = banner.style.backgroundColor;
        tecnologia.innerText = `TECNOLOGIAS QUE UTILIZO  ${aleatorio(tecnologias)} ${aleatorio(emojis)}`
        social.forEach(s => {
            s.style.color = banner.style.backgroundColor;

        })
        reload.addEventListener("click", reloadAnimation)


    }

    consultarAPI()
    


})


circle.forEach(c => {
    c.addEventListener("click", s => {
        eliminarStyles(circle)
        s.target.style.backgroundColor = banner.style.backgroundColor
        s.target.classList.add("selected");


        if (s.target.id == 1) {
            bibliografia.innerText = "Estudie en la Universidad Tamaulipeca, donde exitosamente termine  la carrera de Ingeniería en Sistemas. Logré la certificacion PCEP™ Certified Entry-Level Python Programmer de Python Institute"
        }
        if (s.target.id == 2) {
            bibliografia.innerText = "En el año 2021 me gradué y me invitaron a dar clases ahi mismo. Acepte ya que me gusta compartir lo que mas me gusta hacer y juntarme con personas que les gusta tambien esto. ❤️"

        }

        if (s.target.id == 3) {
            bibliografia.innerText = "En el año 2022 asisti al evento de tecnologia mas grande de México Talent Land. Fue una genial experiencia, que me ha permitido adquirir valiosas habilidades y conocer a personas maravillosas ."

        }

        if (s.target.id == 4) {
            bibliografia.innerText = 'Me gusta tambien la ciberseguridad y espero algun dia llegar a obtener la OSCP.\n "No hay especialización sin repetición" '

        }
    })
})

function eliminarStyles(c) {

    c.forEach(a => {
        if (a.classList.contains("selected")) {
            a.classList.remove("selected")
        }

    })
    circle.forEach(c => {
        if (!c.classList.contains("selected")) {
            c.style.backgroundColor = "white";

        }

    })


}

if (banner) {
    setInterval(() => {
        tecnologia.innerText = `TECNOLOGIAS QUE UTILIZO  ${aleatorio(tecnologias)} ${aleatorio(emojis)}`
    }, 3000)
}



function aleatorio(arr = []) {
    let aleatorio = Math.floor(Math.random() * arr.length);
    let elemento = arr[aleatorio]

    return elemento
}

function setEtiquetasStyle() {
    const etiquetas = document.querySelectorAll(".category")
    etiquetas.forEach(e => {
         if (e.textContent === "HTML") {
        e.style.color = "rgb(106, 190, 205)"
    }

    if (e.textContent === "CSS") {
        e.style.color = "rgb(62, 84, 163)"
    }

    if (e.textContent === "JS") {
        e.style.color = "rgb(207, 99, 144)"
    }

    if (e.textContent === "API") {
        e.style.color = "rgb(170, 215, 66)"
    }
    if (e.textContent === "SASS") {
            e.style.color = "#DD58D6"
    }

    if (e.textContent === "MYSQL") {
        e.style.color = "#FF8551"
    }
    if (e.textContent === "PHP") {
        e.style.color = "#1F6E8C"
    }
    })
}

function reloadAnimation(e) {
    e.target.classList.add("reload")
    banner.style.backgroundColor = aleatorio(colores)
    spanBanner.style.color = banner.style.backgroundColor
    circle.forEach(c => {
        if (c.classList.contains("selected")) {
            c.style.backgroundColor = banner.style.backgroundColor;
        }

    })
    social.forEach(s => {
        s.style.color = banner.style.backgroundColor;

    })




    setTimeout(t => {
        e.target.classList.remove("reload")

    }, 1000)

}


async function consultarAPI() {
    try {
        const url = `${location.origin}/api/projects`;
        const resultado = await fetch(url);
        const project = await resultado.json();
        if (window.location.pathname != "/project") {
            showprojects(project);



        }else{
        showproject(project, window.location.search)



        }
    } catch (error) {
        console.error(error);
    }
}
function showproject(project, idProject) {
    
    
    let id_project = parseInt(idProject.replace(/\D/g, ''), 10);

    if (project.proyectos.some(proyectos_id => proyectos_id.id === id_project.toString())) {
        projects.id = project.proyectos.filter(proyectos_id => proyectos_id.id === id_project.toString())

    }
    const { id, titulo, imagen, descripcion, url, repo, likes} = projects.id[0]
    const projectContent = document.querySelector('.project')
    const showProject = document.createElement("DIV")
    showProject.classList.add('show-project')
    const imgProyect = document.createElement("IMG")
    imgProyect.src = imagen
    imgProyect.alt = titulo
    const tituloProject = document.createElement("H1")
    tituloProject.textContent = titulo
    const showPage = document.createElement("DIV")
    showPage.classList.add("show_page")
    const showurl = document.createElement("A")
    const showrepo = document.createElement("A")
    showurl.href = url
    showurl.target = "_blank"
    showurl.innerText = "Preview Site"
    showrepo.href = repo
    showrepo.target = "_blank"
    showrepo.innerText = "View Code"
    const descripcionContent = document.createElement("DIV")
    descripcionContent.classList.add('content')
    descripcionContent.classList.add('descripcion')
    descripcionContent.innerHTML = `
    <h2>Descripcion del Proyecto</h2>
    <p>${descripcion}</p>
    `

    showPage.append(showurl, showrepo)
    showProject.append(imgProyect, tituloProject, showPage)
    projectContent.append(showProject, descripcionContent)



}



function showprojects(projects){
    console.log(projects.categorias);
    
    const proyectsCard = document.querySelector('.projects-cards')
    for (let x = 0; x < projects.proyectos.length; x++) {
        if (banner) {
            if (x <= 2) {

                const card = document.createElement('DIV')
                const imgProyect = document.createElement('IMG')
                const info = document.createElement('DIV')
                const tituloCard = document.createElement('H3')
                const infoMore = document.createElement('DIV')
                const etiqueta = document.createElement('DIV')
                const actions = document.createElement('DIV')
                const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg')
                const path = document.createElementNS('http://www.w3.org/2000/svg', 'path')
                const textHeart = document.createElement('P')
                textHeart.classList.add('countHeart')
                const textComment = document.createElement('P')

                card.classList.add('card')
                imgProyect.src = projects.proyectos[x].imagen
                imgProyect.alt = projects.proyectos[x].titulo
                info.classList.add('info')
                tituloCard.innerHTML = `<a href="/project?id=${projects.proyectos[x].id}">${projects.proyectos[x].titulo}</a>`
                infoMore.classList.add('info_more')
                etiqueta.classList.add('etiqueta')

                if (projects.categorias.some(c => c.proyectos_id === projects.proyectos[x].id)) {
                    let categoria = projects.categorias.filter(c => c.proyectos_id === projects.proyectos[x].id)
                    categoria.forEach(c => {
                        etiqueta.innerHTML += `<p class="category">${c.categoria}</p>`
                    })
                }
                actions.classList.add('actions')
                svg.classList.add('heart')
                svg.setAttribute("viewBox", "0 0 32 29.6")
                svg.dataset.idProject = projects.proyectos[x].id
                path.setAttribute("d", "M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z")
                svg.appendChild(path)
                svg.onclick = function () {
                    like(projects.proyectos[x])
                }
                textHeart.innerText = projects.proyectos[x].likes
                textHeart.dataset.idProject = projects.proyectos[x].id
                textComment.innerText = projects.proyectos[x].comentarios
                actions.append(svg, textHeart)
                infoMore.append(etiqueta, actions)
                info.append(tituloCard, infoMore)
                card.append(imgProyect, info)
                proyectsCard.appendChild(card)
                setEtiquetasStyle()
                
            }

        } else {
            console.log(projects.proyectos[x]);
            const card = document.createElement('DIV')
            const imgProyect = document.createElement('IMG')
            const info = document.createElement('DIV')
            const tituloCard = document.createElement('H3')
            const infoMore = document.createElement('DIV')
            const etiqueta = document.createElement('DIV')
            const actions = document.createElement('DIV')
            const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg')
            const path = document.createElementNS('http://www.w3.org/2000/svg', 'path')
            const textHeart = document.createElement('P')
            textHeart.classList.add('countHeart')
            card.classList.add('card')
            imgProyect.src = projects.proyectos[x].imagen
            imgProyect.alt = projects.proyectos[x].titulo
            info.classList.add('info')
            tituloCard.innerHTML = `<a href="/project?id=${projects.proyectos[x].id}">${projects.proyectos[x].titulo}</a>`
            infoMore.classList.add('info_more')
            etiqueta.classList.add('etiqueta')

            if (projects.categorias.some(c => c.proyectos_id === projects.proyectos[x].id)) {
                let categoria = projects.categorias.filter(c => c.proyectos_id === projects.proyectos[x].id)
                categoria.forEach(c => {
                    etiqueta.innerHTML += `<p class="category">${c.categoria}</p>`

                })

            }

            actions.classList.add('actions')
            svg.classList.add('heart')
            svg.setAttribute("viewBox", "0 0 32 29.6")
            svg.dataset.idProject = projects.proyectos[x].id
            path.setAttribute("d", "M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z")
            svg.appendChild(path)
            svg.onclick = function () {
                like(projects.proyectos[x])
            }
            textHeart.innerText = projects.proyectos[x].likes
            textHeart.dataset.idProject = projects.proyectos[x].id
            actions.append(svg, textHeart)
            infoMore.append(etiqueta, actions)
            info.append(tituloCard, infoMore)
            card.append(imgProyect, info)
            proyectsCard.appendChild(card)
            setEtiquetasStyle()
            
        }
    }
}

async function like(project) {
    const heartProject = document.querySelector(`[data-id-project="${project.id}"]`)
    projects.id = heartProject.dataset['idProject']
    projects.likes = project.likes
    const datos = new FormData()
    datos.append('id', projects.id)
    datos.append('likes', projects.likes)

    try {
        const url = '`${location.origin}/api/like`';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })

        const resultado = await respuesta.json();


        if (resultado) {
            const textHeart = document.querySelectorAll('.countHeart')
            textHeart.forEach(text => {
                console.log(text);
                
                if (text.dataset['idProject'] == projects.id) {
                    let count = project.likes++
                    text.innerText = parseInt(count) + 1
                }

            })

        }



    } catch (error) {
        console.log(error);

    }


}


