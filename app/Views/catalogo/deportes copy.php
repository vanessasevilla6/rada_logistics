<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class="flex-1">


    <div class=" w-full h-full md:h-screen  py-12 px-12  bg-white bg-no-repeat bg-cover" id="app">

        <div class=" flex w-full  bg-green-500 text-white justify-between  p-4 rounded mb-5">
            <h2 class="font-bold font-sans text-2xl">TORNEOS</h2>
            <a href="#" v-on:click="abreModalTorneo(true,null)" class="p-4 focus:outline-none ">
                <svg class="h-8 w-8 text-color-white focus:text-color-grey" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        </div>

        <div class="w-full  bg-gray-100 p-2 mx-auto rounded">
            <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-100 bg-red-700 border border-red-700 " v-if="onErrorTbl">
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
            <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-700 " v-if="onSuccessTbl">
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

            <table id="torneo-table" class="display table-bordered nowrap bg-white rounded" cellspacing="0" width="100%">
                <thead class="bg-white">
                    <tr>
                        <th>Nombre </th>
                        <th>Deporte</th>
                        <th>Cantidad de equipos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="text-xs text-center">
                    <tr v-for="torneo in torneos" :key="torneo.idTorneo">
                        <td>{{torneo.nombre}}</td>
                        <td>{{torneo.deporte}}</td>
                        <td>{{torneo.numEquipos}}</td>

                        <td>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 break-all ">
                                <button class="bg-green-300 hover:bg-green-400 text-green-900 font-bold py-2  rounded items-center text-xs">
                                    <i class="fas fa-plus-circle fill-current"></i>
                                    <p class="break-all">Eliminar</p>
                                </button>
                                <button class="bg-green-300 hover:bg-green-400 text-green-900 font-bold py-2  rounded items-center text-xs">
                                    <i class="fas fa-plus-circle fill-current"></i>
                                    <p class="break-all">Editar</p>
                                </button>
                                <button class="bg-green-300 hover:bg-green-400 text-green-900 font-bold py-2  rounded items-center text-xs">
                                    <i class="fas fa-plus-circle fill-current"></i>
                                    <p class="break-all">Agregar equipo</p>
                                </button>

                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>




            <!--  
                MODAL
           -->


            <div id="modal_deporte" v-if="modalDeporte" class=" absolute inset-0 bg-white bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">

                <!-- modal -->
                <div id="modal" class="overflow-scroll relative w-10/12 md:w-1/2 h-1/2 md:h-1/2 bg-white rounded shadow-lg transition-opacity transition-transform duration-300">

                    <!-- button close -->


                    <!-- header -->
                    <div class="px-4 py-3 border-b border-gray-200 bg-green-700 ">
                        <h2 class="text-xl font-semibold text-white">{{msg_modal}}</h2>
                    </div>
                    <div class="flex items-center align-center content-center mx-10">

                        <div class="w-full relative flex-1 text-left  items-center justify-items-center opacity-100 z-50 pt-5 pb-5">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                        Deporte
                                    </label>
                                    <input name="name" v-model="nuevoDeporte.nombre" type="text" placeholder="Ingresa el deporte" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />

                                </div>
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                        Nombre del coordinador
                                    </label>
                                    <input name="name" v-model="nuevoDeporte.coordinador" type="text" placeholder="Ingresa el nombre completo" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />

                                </div>

                            </div>

                        </div>

                        <div v-show="onError" class="rounded-md bg-red-200 p-4">
                            <span class="text-red-600 font-bold">
                                {{mensaje}}
                            </span>
                        </div>
                        <div v-show="onSuccess" class="rounded-md bg-green-200 p-4">
                            <span class="text-green-600 font-bold">
                                {{mensaje}}
                            </span>
                        </div>
                    </div>








                    <!-- footer -->
                    <div class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
                        <button @click="guardarDeporte()" class="bg-green-700 hover:bg-green-900 px-4 py-2 rounded text-white focus:outline-none">Guardar cambios</button>

                        <button @click="modalDeporte = false" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded text-white focus:outline-none">Cerrar</button>
                    </div>
                </div>

            </div>



        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script src="https://unpkg.com/vue-data-tables/dist/data-tables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var app = new Vue({
            el: "#app",
            data: {
                url: 'http://localhost:8080/mona_fitness/public/',
                deportes: [],
                trainers: [],
                modalRenovacion: false,
                modalDeporte: false,
                entrenador: {
                    fullName: "",
                    email: "",
                    phone: "",


                },
                modal_trainer_data: false,
                mensaje: "",
                onSuccess: false,
                onError: false,
                onSuccessTbl: false,
                onErrorTbl: false,
                msg_modal: "",
                nuevoDeporte: {
                    nombre: "",
                    coordinador: "",
                }
                //cliente:null, 

            },
            methods: {

                getHorarios() {
                    axios.get(this.url + "allHorarios").then(response => {
                        if (response.data.success) {
                            var horarios = response.data.resp;
                            horarios.forEach(element => {
                                //console.log(element);
                                var inicio = moment("1989-01-01 " + element.startHour).format('LT');
                                var final = moment("1989-01-01 " + element.endHour).format('LT');

                                this.horarios.push({
                                    inicio: inicio,
                                    final: final,
                                    status: element.enabled,
                                    idHorario: element.idClass,
                                    capacidad: element.totalCapacity,
                                    disponibles: element.availablecapacity,
                                    idTrainer: element.idTrainer,
                                    trainer_name: element.fullName,
                                });
                            });
                            // v.noResult()

                        }
                    })
                },
                showInfo(c) {



                },

                abreModalTrainer(type) {

                    this.modal_trainer_data = true;

                },

                abreModalDeporte(isNew, deporte) {
                    if (isNew) {
                        this.msg_modal = "Nuevo deporte"
                    } else {
                        this.msg_modal = "EDITAR " + deporte.deporte;
                    }

                    this.modalDeporte = true;

                },
                cerrarModalNuevoTrainer() {

                    this.entrenador.fullName = "";
                    this.entrenador.phone = "";
                    this.entrenador.email = "";
                    this.modal_trainer_data = false;
                },


                habilitarTrainer(idTrainer) {
                    axios.get('setStatusTrainer/' + idTrainer + '/enable')
                        .then(response => {
                            console.log(response.data);
                            this.obtenerInstructores();
                            this.showAlertTbl(response.data.msg, response.data.code);
                        })


                },
                deshabilitarTrainer(idTrainer) {
                    axios.get('setStatusTrainer/' + idTrainer + '/disable')
                        .then(response => {
                            this.obtenerInstructores();
                            console.log(response.data);
                            this.showAlertTbl(response.data.msg, response.data.code);

                        })


                },
                cambiarTrainer(clase) {

                    this.horarioSeleccionado = clase
                    this.obtenerInstructores(clase.idHorario);
                    this.modalTrainer = true;





                },
                saveTrainer() {
                    axios.post('agregarTrainer', {
                            entrenador: this.entrenador
                        })
                        .then(response => {
                            //console.log(response.data);
                            this.showAlert(response.data.msg, response.data.code);
                            //               this.mensaje=response.msg;
                        })

                },
                obtenerInstructores() {
                    this.trainers = [];
                    //
                    axios.get(this.url + "trainers/0").then(response => {
                        if (response.data.success) {
                            var entrenadores = response.data.resp;
                            entrenadores.forEach(element => {
                                //console.log(element);

                                this.trainers.push({
                                    idTrainer: element.idTrainer,
                                    nombre: element.fullName,
                                    email: element.email,
                                    phone: element.phone,
                                    numClases: element.numClases,
                                    status: element.enabled
                                });
                            });
                            // v.noResult()

                        }
                    })
                },

                showAlert: function(message, code) {
                    this.mensaje = message;
                    if (code == 1) {
                        this.onSuccess = true;

                        setTimeout(() => this.cerrarModalNuevoTrainer(), 2000);
                    } else {
                        this.onError = true;
                    }
                    //               this.mensa
                },
                showAlertTbl: function(message, code) {
                    this.mensaje = message;
                    if (code == 1) {
                        this.onSuccessTbl = true;

                        setTimeout(function() {
                            this.mensaje = "";
                            this.onSuccessTbl = false;
                        }, 2000);
                    } else {
                        this.onErrorTbl = true;
                        setTimeout(function() {
                            this.mensaje = "";
                            this.onErrorTbl = false;
                        }, 3000);
                    }
                    //               this.mensa
                },


            },
            mounted() {


                setTimeout(() => {
                    this.dataTable = $('#deportes-table').DataTable({
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es-mx.json"
                        },
                        "pagingType": "numbers",
                        "lengthMenu": [
                            [5, 10, 20, -1],
                            [5, 10, 20, "All"]
                        ],
                        responsive: true,
                        destroy: true,
                        retrieve: true,
                        autoFill: true,
                        colReorder: true,

                    });
                }, 300);
                //this.obtenerInstructores();
                //this.obtenerInstructores();

            }
        })
    </script>
    </body>

    </html>