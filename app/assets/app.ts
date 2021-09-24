/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import './styles/app.scss';

// start the Stimulus application
import '@popperjs/core';
//import './bootstrap';
import 'Hinclude/hinclude';
import * as boostrap from 'bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';

document.addEventListener("DOMContentLoaded", function (event) {
    const movieDetailsAction = function () {
        event.preventDefault()
        const id = this.getAttribute('data-movie')
        loadModal(id)
        console.log(id);
    }

    const loadModal = async (id: string) => {
        const response = await fetch(`/movies/${id}`)
        const htmlContent = await response.text()

        const elementId = 'movieModal'
        const element = document.getElementById(elementId)
        const modal = new boostrap.Modal(element)

        element.getElementsByClassName('modal-body')[0].innerHTML = htmlContent
    }

    const elements = document.getElementsByClassName("modalControl")

    // @ts-ignore
    for (const element of elements) {
        element.onclick = movieDetailsAction
    }

    const debounce = (func: Function, timeout?: number) => {
        let timer: number | undefined
        return (...args: any[]) => {
            const next = () => func(...args)
            if (timer) {
                clearTimeout(timer)
            }
            // @ts-ignore
            timer = setTimeout(next, timeout > 0 ? timeout : 300)
        }
    }

    document.getElementById('autocomplete_name').addEventListener('keyup', debounce(async (event) => {
        const response = await fetch('/autocomplete?' + new URLSearchParams({
            name: event.target.value,
        }))

        const element = document.getElementById("suggestions-list")
        element.innerHTML = await response.text()
        const elements = document.querySelectorAll("#suggestions-list > .list-group > .modalControl")

        // @ts-ignore
        for (const element of elements) {
            element.onclick = movieDetailsAction
        }

    }))
})
