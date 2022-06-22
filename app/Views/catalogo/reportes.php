<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">


<div class="flex-1">


    <div class=" w-full h-full md:h-screen  py-12 px-12  bg-white bg-no-repeat bg-cover" id="app">

        <div class=" flex w-full  bg-green-700 text-white justify-between content-center p-4 rounded mb-5">
            <h2 class="font-bold font-sans text-2xl align-middle p-4">REPORTES </h2>

        </div>
        <div class=" w-full  bg-white border border-green-800 text-green-800 justify-between content-center p-4 rounded mb-5">
            <h2 class="font-bold  text-sm align-middle p-4 oswald-font uppercase">Filtros</h2>
            <div class="flex items-center align-center content-center w-full top-20 mt-4">
                <div class="flex flex-wrap -mx-3 mb-1">
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Ciclo
                        </label>
                        <div class="inline-block relative w-full ">
                            <select v-model="filtroCiclo" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-5 mb-3 leading-tight focus:outline-none focus:bg-white leading-tight ">
                                <option value="0">Selecciona un ciclo</option>
                                <option v-for="cicloFiltro in ciclos" v-bind:value="cicloFiltro.idCiclo">
                                    {{ cicloFiltro.ciclo}}
                                </option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>

                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Deporte
                        </label>
                        <div class="inline-block relative w-full ">
                            <select v-model="filtroDeporte" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-5 mb-3 leading-tight focus:outline-none focus:bg-white leading-tight ">
                                <option value="0">Selecciona un deporte</option>
                                <option v-for="deporteFiltro in deportes" v-bind:value="deporteFiltro.idDeporte">
                                    {{ deporteFiltro.deporte}}
                                </option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>

                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Campus
                        </label>
                        <div class="inline-block relative  w-full">
                            <select v-model="filtroCampus" @change="seleccionaFacultades" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-5 mb-3 leading-tight focus:outline-none focus:bg-white leading-tight ">
                                <option value="0">Selecciona un campus</option>
                                <option v-for="campusFiltro in campus" v-bind:value="campusFiltro.idCampus">
                                    {{ campusFiltro.campus}}
                                </option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>

                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Facultad
                        </label>
                        <div class="inline-block relative w-full ">
                            <select v-model="filtroFacultad" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-5 mb-3 leading-tight focus:outline-none focus:bg-white leading-tight ">
                                <option value="0">Selecciona una facultad</option>
                                <option v-for="facultadFiltro in facultadesFiltradas" v-bind:value="facultadFiltro.idFacultad">
                                    {{ facultadFiltro.facultad}}
                                </option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>

                    </div>

                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0 place-self-center">

                        <button @click="buscar()" class="bg-green-700 hover:bg-green-900 px-4 py-2 w-full rounded text-white focus:outline-none">Buscar</button>

                    </div>





                </div>
            </div>
        </div>

        <div class="w-full  bg-gray-100 p-2 mx-auto rounded" v-if="registros.length>0">


            <table id="reportes-table" class="display responsive bg-white stripe " cellspacing="0" width="100%">
                <thead class="bg-green-700 text-white text-xs">
                    <tr class="rounded my-5">
                        <th>#</th>
                        <th>APELLIDO PATERNO</th>
                        <th>APELLIDO MATERNO</th>
                        <th>NOMBRE</th>
                        <th>MATRICULA</th>
                        <th>FACULTAD</th>
                        <th>CARRERA</th>
                        <th>PROGRAMA</th>
                        <th>DEPORTE/ASIGNATURA</th>
                        <th>RAMA</th>
                        <th>CAMPUS</th>
                        <th>UNIDAD</th>


                    </tr>
                </thead>
                <tbody class="text-xs text-center">
                    <tr v-for="(registro,index) in registros" :key="index">
                        <th>{{index+1}}</th>
                        <th>{{registro.aPaterno}}</th>
                        <th>{{registro.aMaterno}}</th>
                        <th>{{registro.nombre}}</th>
                        <th>{{registro.matricula}}</th>
                        <th>{{registro.facultad}}</th>
                        <th>{{registro.carrera}}</th>
                        <th>{{registro.programa}}</th>
                        <th>{{registro.deporte}}</th>
                        <th>{{registro.rama}}</th>
                        <th>{{registro.campus}}</th>
                        <th>{{registro.unidad}}</th>

                    </tr>
                </tbody>
            </table>




            <!--  
                MODAL
           -->



        </div>



        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
        <script src="https://unpkg.com/vue-data-tables/dist/data-tables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script>
            var app = new Vue({
                el: "#app",
                data: {
                    url: 'http://localhost:8080/uabc/public/',
                    dataTable: null,
                    registros: [],
                    modal: false,

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
                    deportes: [],
                    campus: [],
                    ciclos: [],
                    facultades: [],
                    todasFacultades: [],
                    facultadesFiltradas: [],
                    carreras: [],
                    filtroFacultad: 0,
                    filtroCampus: 0,
                    filtroDeporte: 0,
                    filtroCiclo: 0,


                    //cliente:null, 

                },
                methods: {
                    seleccionaFacultades() {
                        this.filtroFacultad = 0;
                        this.facultadesFiltro = [];
                        //console.log(this.filtroCampus);
                        if (this.filtroCampus == 0 || this.filtroCampus == -1 ) {
                            this.facultadesFiltradas = this.todasFacultades;

                        } else if (this.filtroCampus == 1) {
                            this.facultadesFiltradas = this.facultades.ensenada
                        } else if (this.campusSeleccionado == 2) {
                            this.facultadesFiltradas = this.facultades.mexicali
                        } else {
                            this.facultadesFiltradas = this.facultades.tijuana
                        }
                        // console.log(this.facultadesFiltradas);



                    },

                    showInfo(c) {



                    },

                    abreModalTrainer(type) {

                        this.modal_trainer_data = true;

                    },

                    abremodal(isNew, torneo) {

                        this.msg_modal = "NUEVO CAMPUS"

                        this.modal = true;

                    },

                    buscar() {

                        //console.log(this.torneos.length);
                        var filtrosBusqueda = {
                            ciclo:this.filtroCiclo,
                            deporte:this.filtroDeporte,
                            campus:this.filtroCampus,
                            facultad:this.filtroFacultad
                        };
                        axios.post(this.url + "getInfoRegistrosReporte/filtros",{filtros:filtrosBusqueda}).then(response => {

                            this.registros = [];
                            var registrosResponse = response.data;
                            var num=1;
                            registrosResponse.forEach(element => {
                                this.registros.push({
                                    num:num,
                                    nombre: element.nombreJugador,
                                    aPaterno: element.apellidos,
                                    aMaterno:element.apellidoMaterno,
                                    deporte:element.deporte,
                                    asignatura:element.asignatura,
                                    carrera:element.carrera,
                                    facultad:element.facultad,
                                    campus:element.campus,
                                    equipo:element.equipo,
                                    matricula:element.matricula,

                                });
                                num++;
                            });
                        this.dataTable.destroy();
                        this.$nextTick(function() {
                            this.dataTable = $('#reportes-table').DataTable({
                            "language": {
                                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es-mx.json"
                            },
                            "pagingType": "numbers",
                            "lengthMenu": [
                                [20, 50, 100, -1],
                                [20, 50, 100, "All"]
                            ],
                            dom: 'Bfrtip',
                            buttons: [{
                                    extend: 'excelHtml5',
                                    autoFilter: true,
                                    sheetName: 'REPORTE REGISTROS EN CICLO'
                                }

                            ],
                            responsive: true,
                            destroy: false,
                            retrieve: true,
                            autoFill: false,
                            colReorder: true,

                        }).columns.adjust().responsive.recalc();
                      });

                        });
                        
                    },
                    cerrarModalNuevoTrainer() {

                        this.entrenador.fullName = "";
                        this.entrenador.phone = "";
                        this.entrenador.email = "";
                        this.modal_trainer_data = false;
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
                    obtenerCiclos() {
                        axios.get(this.url + "/getCiclos").then(response => {
                            this.ciclos = [];
                            var ciclosResponse = response.data;

                            ciclosResponse.forEach(element => {
                                this.ciclos.push({
                                    idCiclo: element.idCiclo,
                                    ciclo: element.ciclo,
                                });
                            });

                        })
                    },
                    obtenerDeportes() {

                        //

                        axios.get(this.url + "/getAllDeportes").then(response => {
                            this.deportes = [];
                            var campusResponse = response.data;
                            this.deportes.push({
                                idDeporte: -1,
                                deporte: "Todos"
                            });
                            campusResponse.forEach(element => {
                                this.deportes.push({
                                    idDeporte: element.idDeporte,
                                    deporte: element.deporte
                                });
                            });




                        })
                    },
                    obtenerCampus() {

                        //
                        axios.get(this.url + "/getAllCampus").then(response => {
                            var campusResponse = response.data;
                            this.campus.push({
                                idCampus: -1,
                                campus: "Todos"
                            });
                            campusResponse.forEach(element => {
                                this.campus.push({
                                    idCampus: element.idCampus,
                                    campus: element.campus
                                });
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
                                this.todasFacultades.push({
                                    idFacultad: element.idFacultad,
                                    facultad: element.facultad
                                });
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

                            this.facultadesFiltradas = this.todasFacultades;

                        })
                    },
                    cargarCarreras() {
                        this.carreras = [];
                        var bodyFormData = new URLSearchParams();
                        bodyFormData.append('func_accion', 'getBuscarProgramasEducativosHtml');
                        bodyFormData.append('idioma', 'es-mx');
                        bodyFormData.append('ids_campus', this.campusSeleccionado);

                        bodyFormData.append('ids_niveles', "");

                        bodyFormData.append('ids_areas_edu', "");
                        bodyFormData.append('ids_unidades', this.facultadSeleccionada);
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


                },
                mounted() {
                    this.obtenerCiclos();
                    this.obtenerCampus();
                    this.obtenerDeportes();
                    this.obtenerFacultades();
                    //console.log(this.torneos.length);
                    setTimeout(() => {
                        this.dataTable = $('#reportes-table').DataTable({
                            "language": {
                                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es-mx.json"
                            },
                            "pagingType": "numbers",
                            "lengthMenu": [
                                [20, 50, 100, -1],
                                [20, 50, 100, "All"]
                            ],
                            dom: 'Bfrtip',
                            buttons: [{
                                    extend: 'excelHtml5',
                                    autoFilter: true,
                                    sheetName: 'REPORTE REGISTROS EN CICLO'
                                }

                            ],
                            responsive: true,
                            destroy: false,
                            retrieve: true,
                            autoFill: false,
                            colReorder: true,

                        }).columns.adjust().responsive.recalc();


                    }, 300);

                    //this.obtenerInstructores();
                    //this.obtenerInstructores();

                }
            })
        </script>
        </body>

        </html>