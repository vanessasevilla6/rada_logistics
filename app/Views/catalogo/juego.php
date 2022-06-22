<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

<div class="flex-1">


    <div class=" w-full h-full md:h-screen  py-12 px-12 bg-white" id="app">
        <div class="mb-3 flex">
            <a href="javascript:window.history.go(-1);" class="cursor-pointer p-2 bg-green-800 text-white rounded inline "> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 inline " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>Regresar a torneos </a>
        </div>


        <?php
        if ($juego) {

            //var_dump($jugadoresVisita);


        ?>


            <div class="w-full">
                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-100 bg-red-700 border border-red-700 " v-if="onError">
                    <div slot="avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-5 h-5 mx-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <div class="text-xl font-normal  max-w-full flex-initial">
                        {{mensaje}}
                    </div>
                    <div class="flex flex-auto flex-row-reverse">
                        <div @click="onErrorTbl == false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-red-400 rounded-full w-5 h-5 ml-2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-700 " v-if="onSuccess">
                    <div slot="avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <div class="text-xl font-normal  max-w-full flex-initial">
                        <div class="py-2">{{mensaje}}

                        </div>
                    </div>
                    <div class="flex flex-auto flex-row-reverse">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>

            <div class="block md:flex mb-6 w-full  text-white justify-between content-center rounded mb-5 md:space-x-2">
                <div class="w-full md:w-1/3 mb-5">
                    <div class="w-full bg-green-800 p-3 rounded">
                        <h2 class="text-white font-sans text-lg font-bold text-center ">JUEGO</h2>
                    </div>
                    <div class="w-full bg-gray-200 border border-green-800 p-3 rounded mt-3">

                        <div class=" w-full  block px-2 py-1 text-sm lg:text-lg text-center bg-green-800 rounded">
                            <label class="text-white text-center">
                                {{juego.casaNombre}}
                            </label>




                        </div>
                        <div class="   block text-center text-black text-2xl text-center font-bold ">
                            VS
                        </div>



                        <div class=" w-full  block px-2 py-1 text-sm lg:text-lg text-center bg-yellow-400 rounded">

                            <label class="text-green-800 text-center">
                                {{juego.visitaNombre}}
                            </label>






                        </div>

                    </div>


                </div>
                <div class="w-full md:w-2/3 ">


                    <!-- Tabs -->
                    <ul id="gameTabs" class="inline-flex w-full px-1 pt-2 tabs">

                        <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-4 border-green-800 rounded-t opacity-100"><a id="default-tab" href="#first">Datos del juego</a></li>

                        <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-4 border-green-800 rounded-t opacity-20"><a href="#second">Jugadores</a></li>

                    </ul>

                    <!-- Tab Contents -->
                    <div id="tab-contents">
                        <div id="first" class="w-full p-4">
                            <div class="w-full relative flex-1 text-left  items-center justify-items-center opacity-100 z-50 ">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full  px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Estatus Juego
                                        </label>
                                        <div class="inline-block relative w-full">
                                            <select v-model="statusJuego" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white leading-tight ">

                                                <option value="1">
                                                    Finalizado
                                                </option>
                                                <option value="2">
                                                    Pospuesto
                                                </option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Marcador {{juego.casaNombre}}
                                        </label>
                                        <input v-model="juego.puntosCasa" type="number" min="0" required class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Marcador {{juego.visitaNombre}}
                                        </label>
                                        <input v-model="juego.puntosVisita" type="number" min="0" required class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />
                                    </div>

                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Fecha Finalizo
                                        </label>
                                        <input name="name" v-model="fecha" type="date" placeholder="dd/mm/yyyy" required class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Hora Fin
                                        </label>
                                        <input name="name" v-model="hora" type="time" placeholder="hh:mm a" required class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />
                                    </div>
                                </div>
                            </div>

                            <div class=" bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3 w-full">
                                <button @click="guardarInfoJuego()" class="bg-green-700 hover:bg-green-900 px-4 py-2 rounded text-white focus:outline-none">Guardar cambios</button>

                                <button @click="" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded text-white focus:outline-none">Cerrar</button>
                            </div>

                        </div>
                        <div id="second" class="hidden p-4">
                            <div class="w-full relative flex-1 text-left  items-center justify-items-center opacity-100 z-50 ">
                                <div class="flex flex-wrap -mx-3 mb-2">
                                    <div class="w-full  px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Selecciona un equipo
                                        </label>
                                        <div class="inline-block relative w-full">
                                            <select v-model="equipoSeleccionado" @change="seleccionaJugadores" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white leading-tight ">
                                                <option v-bind:value="juego.equipoCasa">{{juego.casaNombre}}</option>
                                                <option v-bind:value="juego.equipoVisita">{{juego.visitaNombre}}</option>

                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                        </select>

                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-2">
                                    <div class="w-full px-3 mb-6">
                                        <ul>
                                            <li v-bind:value="jugador.idJugador" class="w-full p-3 shadow-md cursor-pointer" v-for="(jugador,index) in jugadores" :key="jugador.idJugador" v-bind:class="{'bg-gray-100':index%2==0,'bg-gray-300':index%2==1}">
                                                <a class="text-left text-gray-900 text-sm md:text-md cursor-pointer w-full" v-on:click="selectPlayer(jugador.idJugador)">
                                                    {{jugador.nombre}}&nbsp{{jugador.apellidos}}&nbsp{{jugador.apellidoMaterno}}
                                                </a>
                                                <div v-if="selectedPlayer.idJugador==jugador.idJugador" class="bg-gray-300 rounded mt-1">
                                                    <div class="w-full relative flex-1 text-left  items-center justify-items-center opacity-100 z-50 p-1 ">
                                                        <div class="flex flex-wrap -mx-3 mb-6 mt-2">

                                                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 ">
                                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                                    Goles anotados
                                                                </label>
                                                                <input name="name" v-model="selectedPlayer.points" type="number" min="0" required class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />
                                                            </div>
                                                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 ">
                                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                                    Faltas
                                                                </label>
                                                                <input name="name" v-model="selectedPlayer.fouls" type="number" min="0" required class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3 w-full">
                                                        <button @click="guardarJugadasJugador" class="bg-green-700 hover:bg-green-900 px-4 py-2 rounded text-white focus:outline-none">Guardar </button>


                                                    </div>
                                                </div>

                                            </li>

                                        </ul>
                                    </div>
                                </div>


                            </div>
                            <div class=" bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3 w-full">
                                <button @click="guardarInfoJuego()" class="bg-green-700 hover:bg-green-900 px-4 py-2 rounded text-white focus:outline-none">Guardar cambios</button>

                                <button @click="" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded text-white focus:outline-none">Cerrar</button>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
    </div>



</div>

</div>
</div>
<?php

        }
?>



<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
<script src="https://unpkg.com/vue-data-tables/dist/data-tables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script>
    function logItem(e) {
        e.preventDefault();
        console.log('click');
        //e.preventDefault()

    }
    const tabsContainer = document.querySelector("#gameTabs");

    const tabTogglers = tabsContainer.querySelectorAll("a");
    console.log(tabTogglers);
    tabTogglers.forEach((chapter) => {
        chapter.addEventListener('click', logItem);
    });

    //console.log(tabTogglers);

    /* tabTogglers.forEach(function(toggler) {
         toggler.addEventListener("toggle", function(e) {


             let tabName = this.getAttribute("href");
             console.log(tabName);

             let tabContents = document.querySelector("#tab-contents");


             e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
             e.preventDefault();
         });
     });*/
</script>
<script>
    var app = new Vue({
        el: "#app",
        data: {
            url: "<?php echo base_url(); ?>",


            idJuego: "<?php echo $juego ?>",
            equipoSeleccionado: " <?php echo $info_juego->equipoCasa ?>",

            modal: false,
            equipos: [],

            fecha: "",
            hora: "",
            onError: false,
            onSuccess: false,
            mensaje: "",
            cantidadResultados: 10,
            ultimosResultados: [],
            nextGames: [],
            standings: [],
            allTeams: [],
            mensaje: "",
            onError: false,
            onSuccess: false,
            juego: {
                equipoCasa: " <?php echo $info_juego->equipoCasa ?>",
                equipoVisita: " <?php echo $info_juego->equipoVisita ?>",
                casaNombre: "<?php echo $info_juego->equipoCasaNombre ?>",
                puntosCasa: 0,
                visitaNombre: " <?php echo $info_juego->equipoVisitaNombre ?>",
                puntosVisita: 0,
            },
            jugadoresCasa: <?php echo json_encode($jugadoresCasa) ?>,
            jugadoresVisita: <?php echo json_encode($jugadoresVisita) ?>,
            jugadores: [],
            statusJuego: 1,
            fecha: "",
            hora: "",
            juegoInfo: <?php echo json_encode($info_juego) ?>,
            selectedPlayer: {
                idJugador: 0,
                idEquipo: 0,
                points: 0,
                fouls: 0,

            },
            arrayPlayersToUpdateInfoGame: [],


        },
        props: ['$jugadores'],
        methods: {
            actualizaPuntosJuego() {
                this.juego.puntosCasa = parseInt(this.juegoInfo.scoreCasa);
                this.juego.puntosVisita = parseInt(this.juegoInfo.scoreVisita);
                if (this.juegoInfo.finalizado == 1) {
                    formattedDate = this.juegoInfo.finalizado == 1 ? this.juegoInfo.fechaHoraFin.split(" ") : this.juegoInfo.fechaHoraInicio.split(" ");
                    //console.log(formattedDate);
                    this.fecha = formattedDate[0];
                    this.hora = this.formatTime(formattedDate[1]);

                }

            },
            formatTime(time) {
                newTimeArray = time.split(":");
                newTime = newTimeArray[0] + ":" + newTimeArray[1];

                return newTime;
            },


            guardarJugadasJugador() {
                //if(this.selectedPlayer.idJugador.e)
                this.selectedPlayer.idEquipo = this.equipoSeleccionado;
                this.arrayPlayersToUpdateInfoGame.push(this.selectedPlayer);
                console.log(this.arrayPlayersToUpdateInfoGame);
                this.selectedPlayer.idJugador = {
                    idJugador: 0,
                    idEquipo: 0,
                    points: 0,
                    fouls: 0,
                };

                console.log(this.selectedPlayer);
            },
            seleccionaJugadores() {
                this.jugadores = [];
                if (this.equipoSeleccionado == this.juego.equipoCasa) {
                    this.jugadores = this.jugadoresCasa
                } else {
                    this.jugadores = this.jugadoresVisita
                }
            },

            selectPlayer(idJugador) {
                this.selectedPlayer.idJugador = idJugador
            },


            guardarInfoJuego() {
                infoJuego = {
                    idJuego: this.idJuego,
                    status: 1,
                    puntosCasa: this.juego.puntosCasa,
                    puntosVisita: this.juego.puntosVisita,
                    date: this.fecha,
                    time: this.hora,
                }
                axios.post(this.url + "/updateGameInfo", {
                    data: infoJuego
                }).then(response => {
                    console.log(response);

                    this.showResponse(response.data.code, response.data.msg);


                })


            },
            detalleJuego(idJuego) {
                // window.location.href = this.url + "/detalle_juego/" + idJuego;
            },
            nuevoJuego() {
                this.modal = true
            },
            showResponse(code, msg) {
                this.mensaje = msg;
                if (code == 1) {
                    this.onSuccess = true;

                } else {
                    this.onError = true;
                }
                setTimeout(() => this.closeResponse(), 2500);
            },
            closeResponse() {
                this.onError = false;
                this.onSuccess = false;
                this.mensaje = "";
            },
            getTeams(tipo) {
                axios.get(this.url + "/obtenerEquipos/" + this.idTorneo + "/" + tipo).then(response => {
                    this.equipos = [];
                    var equipos = response.data;
                    equipos.forEach(element => {
                        this.equipos.push({
                            idEquipo: element.idEquipo,
                            equipo: element.nombre,
                            validado: element.validado,
                        });
                    });
                })
            },
            getLastResults() {
                axios.get(this.url + "/obtenerUltimosResultados/" + this.idTorneo + "/" + this.cantidadResultados).then(response => {
                    this.ultimosResultados = [];
                    var juegos = response.data;
                    juegos.forEach(element => {
                        this.ultimosResultados.push({
                            idJuego: element.idJuego,
                            idCasa: element.equipoCasa,
                            idVisita: element.equipoVisita,
                            equipoCasaNombre: element.equipoCasaNombre,
                            equipoVisitaNombre: element.equipoVisitaNombre,
                            puntosCasa: element.scoreCasa,
                            puntosVisita: element.scoreVisita
                        });
                    });



                })
            },
            getLastGames() {
                axios.get(this.url + "/obtenerSiguientesJuegos/" + this.idTorneo + "/" + this.cantidadResultados).then(response => {
                    this.nextGames = [];
                    var juegos = response.data;
                    juegos.forEach(element => {
                        var fechaInicio = element.fechaHoraInicio;
                        console.log(fechaInicio);
                        moment.locale('es-mx');
                        console.log(moment(fechaInicio).format('dddd DD MMMM,YYYY(h:mm a)'));
                        this.nextGames.push({
                            fecha: moment(fechaInicio).format('dddd DD MMMM,YYYY(h:mm a)'),
                            sede: element.sede,
                            idJuego: element.idJuego,
                            idCasa: element.equipoCasa,
                            idVisita: element.equipoVisita,
                            equipoCasaNombre: element.equipoCasaNombre,
                            equipoVisitaNombre: element.equipoVisitaNombre,
                            puntosCasa: element.scoreCasa,
                            puntosVisita: element.scoreVisita
                        });
                    });



                })
            },
            getAllInfoGame() {
                axios.get(this.url + "/standings/" + this.idTorneo).then(response => {
                    this.standings = [];
                    var equipos = response.data;
                    equipos.forEach(element => {
                        this.standings.push({
                            idEquipo: element.idEquipo,
                            nombre: element.nombre,
                            ganados: parseInt(element.juegosGanadosCasa) + parseInt(element.juegosGanadosVisita),
                            perdidos: parseInt(element.juegosPerdidosCasa) + parseInt(element.juegosPerdidosVisita),

                        });
                    });

                    this.standings.sort((a, b) => {
                        return b.ganados - a.ganados;
                    });

                })
            },
            validarEquipo(index) {

                this.equipos[index].validado = this.equipos[index].validado == 0 ? 1 : 0;
            },
            saveNewGame() {
                if (this.equipoCasa == this.equipoVisita) {

                } else {
                    var newGame = {
                        homeTeam: this.equipoCasa,
                        awayTeam: this.equipoVisita,
                        date: this.fecha,
                        time: this.hora,
                        torneo: this.idTorneo,
                        sede: ""
                    };

                    axios.post(this.url + "/saveGameTournament", {
                        data: newGame
                    }).then(response => {
                        console.log(response);




                    })




                }
            },
            showAlert: function(message, code) {
                this.mensaje = message;
                if (code == 1) {
                    this.onSuccess = true;

                    setTimeout(() => this.closeAlerts(), 2000);
                } else {
                    this.onError = true;
                    setTimeout(() => this.closeAlerts(), 2000);
                }
                //               this.mensa
            },

            closeAlerts() {
                this.onError = false;
                this.onSuccess = false;
                mensaje = "";
            },
            logItem(e) {


                //e.preventDefault()

            },




        },
        mounted() {
            //document.getElementById("default-tab").addEventListener();
            let tabsContainer = document.querySelector("#gameTabs");

            let tabTogglers = tabsContainer.querySelectorAll("a");

            tabTogglers.forEach((toggler) => {
                toggler.addEventListener('click', function(e) {
                    e.preventDefault();
                    //console.log('click');
                    let tabName = e.target.getAttribute("href");
                    console.log(tabName + " tabname");

                    let tabContents = document.querySelector("#tab-contents");
                    //console.log(tabContents);

                    for (let j = 0; j < tabContents.children.length; j++) {

                        console.log(tabContents.children[j]);
                        tabTogglers[j].parentElement.classList.remove("opacity-100");
                        tabTogglers[j].parentElement.classList.add("opacity-50");
                        tabContents.children[j].classList.remove("hidden");
                        console.log(tabContents.children[j].id);
                        if ("#" + tabContents.children[j].id === tabName) {
                            continue;
                        }
                        tabContents.children[j].classList.add("hidden");

                        //console.log(tabContents.children[j].id);

                    }
                    //e.target.classList.remove('hidden');
                    e.target.parentElement.classList.add("border-green-800", "opacity-100");

                });
            });
            var elem = document.getElementById("default-tab");
            if (typeof elem.onclick == "function") {
                elem.onclick.apply(elem);
            }
           
            this.jugadores = this.jugadoresCasa;
            this.actualizaPuntosJuego();
            //document.getElementById("default-tab").click();


            //this.getStandings();
            //this.getLastResults();
            //this.getLastGames();
            //this.getTeams("todos");

        }
    });
</script>
</body>

</html>