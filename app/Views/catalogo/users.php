<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

<div class="flex-1">


    <div class=" w-full h-full md:h-screen  py-12 px-12  bg-white bg-no-repeat bg-cover" id="app">

        <div class=" flex w-full  bg-green-700 text-white justify-between content-center p-4 rounded mb-5">
            <h2 class="font-bold  text-2xl align-middle p-4 oswald-font uppercase">USUARIOS DE SISTEMA</h2>
            <a href="#" @click="abreModalusuario" class="p-4 focus:outline-none align-middle ">
                <svg class="h-8 w-8 text-white focus:text-grey" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <table id="usuarios-table" class="divide-y divide-gray-300 responsive bg-white " width="100%">
                        <thead class="bg-green-700 text-yellow-400 font-bold rounded mt-3 oswald-font uppercase">
                            <tr class="my-5">
                                <th class="px-6 py-2 text-md">Correo Electrónico </th>
                                <th class="px-6 py-2 text-md ">Teléfono</th>
                                <th class="px-6 py-2 text-md ">Tipo de usuario</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-xs text-center">
                            <tr v-for="usuarioResp in usuarios" :key="usuarioResp.idUsuario" class="whitespace-nowrap roboto-font">
                          
                                <td class="px-6 py-4 text-sm text-gray-500">{{usuarioResp.email}}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{usuarioResp.tel}}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{usuarioResp.idTipo}}</td>

                                <td class="px-6 py-4 text-sm">
                                    <div class="grid grid-cols-1 gap-2 content-center break-all ">
                                        <a v-on:click="resetUserPassword(usuarioResp.idUsuario)" href="#" class="bg-green-900 hover:bg-green-500 text-white font-bold p-2  rounded items-center text-xs break-words">
                                            <i class="fa-solid fa-arrows-rotate fill-current"></i>
                                        </a>
                                        <a v-if="usuarioResp.idTipo == '1' || usuarioResp.idTipo=='2' || usuarioResp.idTipo=='5'" v-on:click="" href="#" class="bg-green-900 hover:bg-green-500 text-white font-bold p-2  rounded items-center text-xs break-words">
                                            <i class="fa-solid fa-trash-can fill-current"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>





            <!--  
                MODAL
           -->




            <div v-if="modalusuario" class="fixed block inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                <div class="relative top-5  mx-auto p-2 border overflow-scroll w-11/12 md:w-3/5 h-2/5 md:h-2/5  shadow-lg rounded-md bg-white">

                    <div class=" relative items-center justify-center w-full h-full ">
                        <div class="relative top-0 left-0 px-4 py-3 border-b border-grey-200 bg-green-700 w-full flex justify-start items-center gap-3 ">
                            <h2 class="text-xl font-semibold text-white">{{msg_modal}}</h2>
                        </div>
                        <div class="flex items-center align-center content-center w-full top-20 mt-4">

                            <div class="w-full relative flex-1 text-left  items-center justify-items-center opacity-100 z-50 ">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Correo electrónico
                                        </label>
                                        <input name="name" v-model="usuarioN.email" type="email" placeholder="Ingresa el correo del usuario" required class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />

                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Teléfono
                                        </label>
                                        <input name="name" v-model="usuarioN.tel" type="tel" placeholder="Ingresa el correo del usuario" required class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />

                                    </div>

                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">

                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Rol de usuario
                                        </label>
                                        <div class="inline-block relative ">
                                            <select v-model="usuarioN.rol" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white leading-tight ">
                                                <option value="0">Selecciona un rol</option>
                                                <option v-for="rol in rolesUsuario" v-bind:value="rol.idRol">
                                                    {{ rol.rol}}
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
                                <div class="relative bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3 w-full">

                                    <button @click="guardarUsuario()" class="bg-green-700 hover:bg-green-900 px-4 py-2 rounded text-white focus:outline-none">Guardar usuario</button>

                                    <button @click="cerrarModal()" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded text-white focus:outline-none">Cerrar</button>
                                </div>
                            </div>








                            <!-- footer -->

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
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

        <script>
            var app = new Vue({
                el: "#app",
                data: {
                    url: "<?php echo base_url(); ?>",
                    dataTable: null,
                    usuarios: [],
                    trainers: [],
                    modalRenovacion: false,
                    modalusuario: false,
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
                    },
                    rolesUsuario: [],
                    deporteSeleccioado: 0,
                    maxParticipantes: 0,
                    nombreusuario: "",
                    fechaInicio: "",
                    fechaFinal: "",
                    fechaInicioInsc: "",
                    fechaFinalInsc: "",
                    ramaSeleccionada: [],
                    municipiosSeleccionados: [],
                    externos: '',
                    esDeporteEquipo: true,
                    test: "hola",
                    campus: [],
                    correoContacto: "",
                    telContacto: "",
                    convocatoria: null,
                    usuarioN: {
                        idUsuario: 0,
                        email: "",
                        tel: "",
                        rol: 0,
                    }
                    //cliente:null, 

                },
                methods: {


                    resetUserPassword(idUsuario) {

                        axios.get(this.url + "/resetPassword/" + idUsuario).then(response => {


                            alert(data.response.nuevoPsswd);



                        })
                    },


                    abreModalusuario(isNew, usuario) {
                        //this.obtenerCampus();
                        this.obtenerRoles();
                        if (isNew) {
                            this.msg_modal = "Nuevo usuario"
                        } else {
                            this.msg_modal = "EDITAR " + usuario.nombre;
                        }

                        this.modalusuario = true;

                    },

                    guardarUsuario() {

                        //console.log(this.usuarios.length);
                        var nuevoUsuario = {
                            //idusuario: parseInt(this.usuarios.length) + 1,
                            email: this.nombreusuario,
                            idDeporte: this.deporteSeleccioado,
                            sedes: this.municipiosSeleccionados,
                            inicio: this.fechaInicio,
                            fin: this.fechaFinal,
                            inicioInscripciones: this.fechaInicioInsc,
                            finInscripciones: this.fechaFinalInsc

                        };
                        axios.post(this.url + "/nuevo_usuario", {
                            info: nuevousuario,
                        }).then(response => {
                            // this.modalusuario = false;
                            //console.log(response.data.msg);
                            //this.obtenerusuarios();
                            var resp = response.data;

                            this.showAlert(response.data.msg, response.data.code);


                        })



                    },
                    cerrarModalNuevoTrainer() {

                        this.entrenador.fullName = "";
                        this.entrenador.phone = "";
                        this.entrenador.email = "";
                        this.modal_trainer_data = false;
                    },

                    obtenerRoles() {


                        axios.get(this.url + "/getUserRoles").then(response => {
                            this.rolesUsuario = [];
                            var rolesResponse = response.data;
                            rolesResponse.forEach(element => {
                                this.rolesUsuario.push({
                                    idRole: element.idTipoUsuario,
                                    rol: element.tipo
                                });
                            });




                        })
                    },

                    obtenerDeportes() {

                        //

                        axios.get(this.url + "/getAllDeportes").then(response => {
                            this.deportes = [];
                            var campusResponse = response.data;
                            campusResponse.forEach(element => {
                                this.deportes.push({
                                    idDeporte: element.idDeporte,
                                    deporte: element.deporte
                                });
                            });




                        })
                    },



                    obtenerUsuarios() {


                        axios.get(this.url + "/getUsuarios").then(response => {
                            this.usuarios = [];
                            var usuariosResp = response.data;
                            usuariosResp.forEach(element => {
                               
                                this.usuarios.push({
                                    idUsuario: element.idUsuario,
                                    email: element.email,
                                    tel: element.tel,
                                    idTipo: element.idTipoUsuario,
                                    tipo: element.tipo
                                });
                            });

                            this.dataTable.destroy();
                            this.$nextTick(function() {
                                this.dataTable = $('#usuarios-table').DataTable({
                                    "language": {
                                        "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es-mx.json"
                                    },
                                    "pagingType": "numbers",
                                    "lengthMenu": [
                                        [5, 10, 20, -1],
                                        [5, 10, 20, "All"]
                                    ],
                                    responsive: true,
                                    destroy: false,
                                    retrieve: true,
                                    autoFill: false,
                                    colReorder: true,

                                }).columns.adjust().responsive.recalc();
                            });
                            // v.noResult()


                        })
                    },

                    showAlert: function(message, code) {

                        this.mensaje = message;
                        if (parseInt(code) == 1) {
                            this.onSuccess = true;
                            this.obtenerusuarios();
                            setTimeout(() => this.cerrarModal(), 2000);
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

                    cerrarModal() {
                        this.modalusuario = false;
                    }


                },
                mounted() {
                    //this.obtenerCampus().then((result) => {

                    setTimeout(() => {
                        this.dataTable = $('#usuarios-table').DataTable({
                            "language": {
                                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es-mx.json"
                            },
                            "pagingType": "numbers",
                            "lengthMenu": [
                                [5, 10, 20, -1],
                                [5, 10, 20, "All"]
                            ],
                            responsive: true,
                            destroy: false,
                            retrieve: true,
                            autoFill: false,
                            colReorder: true,

                        }).columns.adjust().responsive.recalc();
                        this.obtenerUsuarios();
                    }, 300);

                    //console.log(this.usuarios.length);

                    //this.obtenerInstructores();
                    //this.obtenerInstructores();

                }
            })
        </script>
        </body>

        </html>