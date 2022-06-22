<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

<div class="flex-1">


    <div class=" w-full h-full md:h-screen  py-12 px-12 bg-white" id="app">
    <div class="mb-3 flex">
            <a href="javascript:window.history.go(-1);" class="cursor-pointer p-2 bg-green-800 text-white rounded inline "> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 inline " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>Regresar a equipos </a>
        </div>
        <?php
        if ($equipo->idEquipo) {


        ?>

            <div class=" flex w-full  bg-green-700 text-white justify-between content-center p-4 rounded mb-5">
                <div class="w-4/5">
                    <h2 class="font-bold font-sans text-2xl align-middle px-4 py-2 uppercase">{{equipo.nombre}}</h2>

                </div>
                <?php

                if ($tipoUsuario == 1) {
                ?>
                    <a href="#" class="p-4 focus:outline-none  focus:text-yellow-400">
                        <svg class="h-8 w-8" xmlns= "http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>

                <?php

                }

                ?>


            </div>
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

            <div class="block mb-6 w-full  text-white justify-between content-center rounded md:space-x-2 h-42  ">
                <ul id="gameTabs" class="inline-flex w-full px-1 pt-2 tabs">

                    <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-4 border-green-800 rounded-t opacity-100"><a id="default-tab" href="#first">Jugadores</a></li>

                    <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-4 border-green-800 rounded-t opacity-20"><a href="#second">Juegos</a></li>

                </ul>

                <!-- Tab Contents -->
                <div id="tab-contents">
                    <div id="first" class="w-full p-4">
                        <div class="w-full relative flex-1 text-left  items-center justify-items-center opacity-100 z-50 ">
                            <div class="w-full bg-gray-200 border border-green-800 rounded p-2 mt-3">
                                <ul class="w-full m-1 rounded">
                                    <li v-on:click="showInfoPlayer(item)" class="w-full block md:flex rounded mb-5 shadow-md bg-white cursor-pointer" v-for="(item,index) in jugadores" :key="item.idJugador" v-if="!showInfo" class="w-full flex bg-gray-200 border border-green-800 p-3 rounded mt-3" v-if="jugadores.length>0 && !showInfo">
                                        <div class="flex md:relative w-full justify-between inline block px-2 py-1 text-sm lg:text-md">
                                            <div class="w-2/3 inline align-middle">
                                                <label class="text-green-800 text-left my-1 roboto-font text-md font-bold block uppercase ">
                                                    {{item.nombre}} {{item.apellidos}} {{item.apellidoMaterno}}
                                                </label>
                                                <label class="font-bold text-xs bg-yellow-400 text-green-800 rounded p-1 mt-1 mb-2 block w-full md:w-1/4 text-left">{{item.matricula}}</label>
                                            </div>


                                            <div v-on:click="" class="place-self-center inline text-center">
                                                <i class="fa-solid fa-circle-xmark text-red-700"></i>

                                            </div>


                                        </div>


                                    </li>

                                </ul>
                            </div>

                            <div class="w-full flex bg-gray-200 border border-green-800 p-3 rounded mt-3" v-if="showInfo && jugadores.length>0">
                                <div class="w-full relative flex-1 text-left  items-center justify-items-center opacity-100 z-50 ">
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full  px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                Matrícula
                                            </label>
                                            <input v-model="emptyPlayer.matricula" :disabled="!editable" v-on:change="" type="number" min="0" required class="appearance-none block w-full bg-white text-gray-700 border border-green-800  rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white" />
                                            <label v-if="existeJugador" class="block uppercase tracking-wide text-red-800 text-xs" for="grid-first-name">
                                                {{msgjugador}}
                                            </label>
                                        </div>
                                        <div class="w-full md:w-1/3 px-3 mt-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                Nombre(s)
                                            </label>
                                            <input v-model="emptyPlayer.nombres" type="text" :disabled="!editable" required class="appearance-none block w-full bg-white text-gray-700 border border-green-800  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white disabled:bg-gray-100 disabled:border-gray-400" />

                                        </div>
                                        <div class="w-full md:w-1/3 px-3 mt-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                Apellido Paterno
                                            </label>
                                            <input v-model="emptyPlayer.apellidoPaterno" type="text" :disabled="!editable" required class="appearance-none block w-full bg-white text-gray-700 border border-green-800  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white disabled:bg-gray-100 disabled:border-gray-400" />

                                        </div>
                                        <div class="w-full md:w-1/3 px-3 mt-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                Apellido Materno
                                            </label>
                                            <input v-model="emptyPlayer.apellidoMaterno" type="text" :disabled="!editable" required class="appearance-none block w-full bg-white text-gray-700 border border-green-800  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />
                                        </div>
                                        <div class="w-full md:w-1/2 px-3 mt-3 mb-6 md:mb-0 flex flex-wrap">

                                            <div class=" px-3 mb-6 md:mb-0 justify-center items-center">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                    Sexo
                                                </label>
                                                <div class="bg-gray-300 rounded-lg text-gray-600">
                                                    <div class="inline-flex rounded-lg">
                                                        <input type="radio" name="room_type" :disabled="!editable" id="roomPrivate"  :checked="emptyPlayer.sexoSeleccionado==0" hidden v-model="emptyPlayer.sexoSeleccionado" v-bind:value="0" />
                                                        <label for="roomPrivate" class="radio text-center self-center py-2 px-4 rounded-lg cursor-pointer hover:opacity-75">HOMBRE</label>
                                                    </div>
                                                    <div class="inline-flex rounded-lg">
                                                        <input type="radio" name="room_type" :disabled="!editable" id="roomPublic" hidden :checked="emptyPlayer.sexoSeleccionado==1" v-model="emptyPlayer.sexoSeleccionado" v-bind:value="1" />
                                                        <label for="roomPublic" class="radio text-center self-center py-2 px-4 rounded-lg cursor-pointer hover:opacity-75">MUJER</label>
                                                    </div>
                                                </div>

                                            </div>




                                        </div>

                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                Correo uabc
                                            </label>
                                            <input v-model="emptyPlayer.email" type="email" :disabled="!editable" placeholder="Solo correo UABC" required class="appearance-none block w-full bg-white text-gray-700 border border-green-800  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />
                                        </div>
                                        <div class="w-full hidden md:w-1/2 px-3 mb-6 md:mb-0">

                                        </div>
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                Campus
                                            </label>
                                            <div class="inline-block relative w-full">
                                                <select v-model="emptyPlayer.idCampus" :disabled="!editable" @change="seleccionaFacultades(-1)" class="appearance-none block w-full bg-white text-gray-700 border border-green-800  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white leading-tight ">
                                                    <option value="0">Selecciona un campus</option>
                                                    <option v-for="campusOption in campus" v-bind:value="campusOption.idCampus">
                                                        {{ campusOption.campus}}
                                                    </option>
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                    </svg>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                Facultad
                                            </label>
                                            <div class="inline-block relative w-full">
                                                <select v-model="emptyPlayer.idFacultad" :disabled="!editable" @change="cargarCarreras" class="appearance-none block w-full bg-white text-gray-700 border border-green-800  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white leading-tight ">
                                                    <option value="0">Selecciona una facultad</option>
                                                    <option v-for="facultad in facultadesFiltro" v-bind:value="facultad.idFacultad">
                                                        {{ facultad.facultad}}
                                                    </option>
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                    </svg>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                Carrera
                                            </label>
                                            <div class="inline-block relative w-full">
                                                <select v-model="carreraSeleccionada" :disabled="!editable" @change="cargarCarreras" class="appearance-none block w-full bg-white text-gray-700 border border-green-800  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white leading-tight ">
                                                    <option value="-1">Selecciona una carrera</option>
                                                    <option v-for="(carrera,index) in carreras" v-bind:value="index">
                                                        {{carrera}}
                                                    </option>
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                    </svg>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>



                            <div class=" bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3 w-full">
                                <button @click="" class="bg-green-700 hover:bg-green-900 px-4 py-2 rounded text-white focus:outline-none">Guardar cambios</button>

                                <button @click="" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded text-white focus:outline-none">Cerrar</button>
                            </div>
                        </div>

                    </div>
                    <div id="second" class="hidden p-4">
                        <div class="w-full relative flex-1 text-left  items-center justify-items-center opacity-100 z-50 ">





                            <div class=" bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3 w-full">
                                <button @click="" class="bg-green-700 hover:bg-green-900 px-4 py-2 rounded text-white focus:outline-none">Guardar cambios</button>

                                <button @click="" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded text-white focus:outline-none">Cerrar</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        <?php
        }
        ?>


    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
<script src="https://unpkg.com/vue-data-tables/dist/data-tables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script>
    var app = new Vue({
        el: "#app",
        data: {
            mensaje: "",

            onError: false,
            onSuccess: false,
            equipo: {
                nombre: '<?php echo $equipo->nombre ?>',
                idEquipo: '<?php echo $equipo->idEquipo ?>'
            },
            jugadores: <?php echo json_encode($jugadores) ?>,
            showInfo: false,
            editable: true,
            campus: [],
            facultades: [],
            allTeams: [],
            jugadorSeleccionado: 0,
            equipoSeleccionado: 0,
            deporteEquipo: 0,
            emptyPlayer: {
                idJugador: 0,
                nombres: "",
                apellidoPaterno: "",
                apellidoMaterno: "",
                matricula: "",
                email: "",
                otraCarrera: false,
                idFacultad: 0,
                idCampus: 0,
                carrera: -1,
                tipo: 4,
                sexoSeleccionado: 0,
            },
            facultadesFiltro: [],
            existeJugador: false,
            playerInfo: 0,
            campusSeleccionado: 0,
            facultadSeleccionada: 0,
            carreraSeleccionada: -1,
            carreras: [],
        },
        methods: {

            showInfoPlayer(jugador) {
                this.showInfo = true;
                //this.buscarMatricula()
                console.log(jugador);
                this.emptyPlayer.idJugador = jugador.idJugador;
                this.emptyPlayer.nombres = jugador.nombre;
                this.emptyPlayer.apellidoPaterno = jugador.apellidos;
                this.emptyPlayer.apellidoMaterno = jugador.apellidoMaterno;
                this.emptyPlayer.matricula = jugador.matricula;
                this.emptyPlayer.email = jugador.email;
                this.emptyPlayer.idCampus = jugador.idCampus;
                this.emptyPlayer.sexoSeleccionado = jugador.genero;
                this.seleccionaFacultades(parseInt(jugador.idFacultad));
                this.carreras = [jugador.carrera.trim()];
                this.carreraSeleccionada = 0;
                this.emptyPlayer.carrera = 0;
                this.editable = false


            },
            seleccionaFacultades(facultad) {

                this.emptyPlayer.idFacultad = 0;
                this.emptyPlayer.carrera = "";
                this.carreraSeleccionada = -1;

                if (this.emptyPlayer.idCampus == 0) {
                    this.facultadesFiltro = [];
                    this.carreras = [];

                } else if (this.emptyPlayer.idCampus == 1) {
                    this.facultadesFiltro = this.facultades.ensenada
                } else if (this.emptyPlayer.idCampus == 2) {
                    this.facultadesFiltro = this.facultades.mexicali
                } else {
                    this.facultadesFiltro = this.facultades.tijuana
                }

                if (facultad > 0) {
                    this.emptyPlayer.idFacultad = facultad;
                }


                //console.log(this.campusSeleccionado)

            },

            newPlayer() {
                //this,carreras=[];
                this.emptyPlayer = {
                    idJugador: -1,
                    nombres: "",
                    apellidos: "",
                    matricula: "",
                    email: "",
                    otraCarrera: false,
                    idFacultad: 0,
                    sexoSeleccionado: 0,
                    idCampus: 0,
                    carrera: -1,
                    tipo: 4
                };
                this.showInfo = true;
                this.editable = true;
            },
            cargarCarreras() {
                this.carreras = [];

                var bodyFormData = new URLSearchParams();
                bodyFormData.append('func_accion', 'getBuscarProgramasEducativosHtml');
                bodyFormData.append('idioma', 'es-mx');
                bodyFormData.append('ids_campus', this.emptyPlayer.idCampus);

                bodyFormData.append('ids_niveles', "");

                bodyFormData.append('ids_areas_edu', "");
                bodyFormData.append('ids_unidades', this.emptyPlayer.idFacultad);
                bodyFormData.append('palabra_clave', "");

                axios({
                    method: "POST",
                    url: "https://www.uabc.mx/wp-content/uabc/includes/uabc_api.php",
                    //contentType:""
                    data: bodyFormData,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },

                }).then(response => {

                    //tb01
                    var htmlTable = response.data;

                    var data = Array();
                    var div = $("<div class='bar'></div>");
                    div.addClass("hidden");
                    div.append(htmlTable);
                    var tbl = div.find('table tbody').find('tr').each(function(i, v) {
                            data[i] = Array();
                            $(this).children('td').each(function(ii, vv) {
                                data[i][ii] = $(this).text();
                            });
                        }

                    );

                    data.forEach(element => {
                        this.carreras.push(element[3]);
                    });

                })
            },
            obtenerFacultades() {

                //
                axios.get(this.url + "/getAllFacultades").then(response => {
                    this.facultades = [];
                    var facultadesResp = response.data;
                    arrayTijuana = [], arrayMexicali = [], arrayEnsenada = [];
                    facultadesResp.forEach(element => {

                        if (element.campus == "Tijuana") {
                            arrayTijuana.push({
                                idFacultad: element.idFacultad,
                                facultad: element.facultad,
                            });
                        } else if (element.campus == "Mexicali") {
                            arrayMexicali.push({
                                idFacultad: element.idFacultad,
                                facultad: element.facultad,
                            });
                        } else {
                            arrayEnsenada.push({
                                idFacultad: element.idFacultad,
                                facultad: element.facultad,
                            });
                        }

                    });

                    this.facultades = {
                        tijuana: arrayTijuana,
                        mexicali: arrayMexicali,
                        ensenada: arrayEnsenada
                    }

                })
            },
            obtenerCampus() {

                //
                axios.get(this.url + "/getAllCampus").then(response => {
                    var campusResponse = response.data;
                    campusResponse.forEach(element => {
                        this.campus.push({
                            idCampus: parseInt(element.idCampus),
                            campus: element.campus
                        });
                    });




                })
            },

        },
        mounted() {
           console.log(this.jugadores);
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


        }
    });
</script>
</body>

</html>