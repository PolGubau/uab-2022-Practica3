<style>
    :root {
        --grey: #808080;
        --lightGrey: #dadada;
        --midGrey: #c4c4c4;
        --white: #ffffff;
        --red: #ffaaaa;

        --redHover: #b47575;
        --yellow: #ffd7aa;
        --yellowLight: #fff2d7;
        --green: #aaffaa;
        --greenHover: #73b173;
        --blue: #aaaaff;
        --black: #000;

        --gradientBackground: linear-gradient(45deg, var(--blue) 0%, var(--green) 100%);
    }

    a {
        color: var(--black);
        text-decoration: none;
    }

    h1 {
        font-size: 2em;
        margin: 0;
    }

    * {
        font-family: 'Poppins', Arial, Helvetica, sans-serif;
    }

    /* ANIMATIONS */

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    body {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: var(--gradientBackground);
        background-size: 400% 400%;
        animation: gradient 7s ease infinite;
    }

    .container {
        margin-top: 3vh;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 70vw;
        min-height: 80vh;
        max-width: 1200px;
        background-color: var(--white);
        border-radius: 20px;
        padding: 35px 30px 50px 30px;
        align-items: center;
        justify-content: flex-start;
        align-content: center;
        flex-wrap: wrap;
    }

    .containerSmall {
        min-height: fit-content;
        min-width: 30vw;
    }

    .settingsRight {
        position: absolute;
        top: 0;
        right: 0;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
        gap: 10px;
    }

    .settingsRight a {
        color: var(--black);
        text-decoration: none;
        font-size: 0.9em;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 10px;
        border: none;
        cursor: pointer;
        background-color: var(--lightGrey);
        border-radius: 20px 0 0 20px;

    }

    .settingsRight> :first-child {
        border-radius: 0 20px 0 20px;
    }

    .settingsLeft {
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        gap: 10px;
    }

    .settingsLeft a {
        border: 5px solid white;
        border-left: none;
        color: var(--black);
        text-decoration: none;
        font-size: 0.9em;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 10px;
        cursor: pointer;
        background-color: var(--lightGrey);
        border-radius: 0 20px 20px 0;

    }

    .settingsLeft> :first-child {
        border-top: none;
        border-radius: 20px 0 20px 0;
    }

    .logout {
        background-color: var(--red) !important;

    }

    .sections {
        padding: 30px;
        display: grid;
        margin-bottom: 20px;
        gap: 30px;
        grid-template-columns: 1fr 1.3fr;
    }

    @media screen and (max-width: 768px) {
        .sections {
            grid-template-columns: 1fr;
        }
    }



    .header {
        background-color: var(--grey);
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        height: 120px;
        width: 100%;
        border-radius: 20px 20px 0 0;
    }

    .titulo {
        font-weight: bold;
        border-bottom: 2px var(--lightGrey) solid;
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        display: flex;
        gap: 6px;
    }

    .section {
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    .img {
        width: 170px;
        height: 170px;
        border-radius: 50%;
        border: 5px solid var(--grey);
        margin: -120px 0px 25px 40px;
    }

    .col2 {
        margin-top: 15px;
        line-height: 1.25em;
    }

    .col2 ul {
        margin-left: -31px;
    }


    .tituloprincipal {
        margin-left: 200px;
        font-weight: bold;
        color: var(--white);
    }

    /*Puntitos de lista quitados*/

    .col1 ul {
        margin-left: -31px;
    }

    .item_lista {
        display: flex;
        gap: 7px;
        margin-bottom: 4px;
    }

    .article {
        display: flex;
        margin-bottom: 17px;

    }

    .articleContent {
        background-color: var(--lightGrey);
        padding: 10px 15px;
        border-radius: 20px;
    }

    h4 {
        font-size: 1.1em;
        padding: 0;
        margin: 0;
        font-weight: bold;
    }

    /*Iconos*/
    .fa-solid {
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--grey);
    }



    /*Barra de progressos*/
    .progress-bar {
        background-color: var(--lightGrey);
        justify-content: center;
        align-items: center;

    }



    .barraProgreso {
        display: flex;
        margin-bottom: 4px;
        align-items: center;
    }

    .progress {
        position: relative;
        height: 15px;
        width: 100%;
        background-color: var(--lightGrey);
        border-radius: 10px;
        overflow: hidden;
    }

    .progress .percent {
        z-index: 3;
        position: absolute;
        height: 15px;
        /* background-color: var(--blue); */
        border-radius: 10px;

    }

    .progress .percent .accent {
        z-index: 2;
        position: absolute;
        height: 15px;
        background-color: var(--grey);
        border-radius: 10px;
        animation: width 1s ease;
        width: 100%;
    }

    @keyframes width {
        0% {
            width: 0%;
        }

        100% {
            width: 100%;
        }
    }




    .subtitulo {
        color: var(--lightGrey);
    }

    redHover .universidad {
        color: var(--lightGrey);
    }

    .return {
        background-color: var(--grey);
        position: fixed;
        top: 0px;
        text-decoration: none;
        color: var(--white);
        left: 0;
        width: fit-content;
        padding: 0 25px 0 15px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 0 0 30px 0;
    }

    .return:hover {
        background-color: var(--lightGrey);
        color: var(--black);
    }



    @media only screen and (max-width: 600px) {

        .row2 {
            display: flex;
            flex-direction: column;
        }

        .row2>* {
            width: 100%;
        }

        .barraProgreso {
            display: flex;
            flex-direction: column;
        }
    }


    .greyText {
        color: var(--grey);
    }

    .barra_base {
        background-color: var(--lightGrey);
        position: relative;
        width: 100%;
        height: 10px;
        border-radius: 5px;

    }

    .barra_nivel {
        background-color: var(--grey);
        position: absolute;
        height: 10px;
        border-radius: 5px;
    }

    .row_barras {
        display: grid;
        width: 100%;
        grid-template-columns: 1fr 4fr;
        align-content: center;
        justify-items: stretch;
        align-items: center;
        justify-content: center;
    }
</style>