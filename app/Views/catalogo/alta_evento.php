<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    [v-cloak] {
        display: none;
    }
</style>
<div class="flex-1 ">


    <div class="relative w-full h-full md:h-full  py-12 px-12 items-start justify-items-start bg-white bg-no-repeat bg-cover bg-opacity-80" id="app" v-cloak>
        <div class="w-full bg-green-700 text-white text-start justify-left p-4 rounded-md">
            <h2 class="font-bold font-sans text-2xl">NUEVO TORNEO</h2>
        </div>

        

        <div class="w-full relative flex-1 text-left  items-center justify-items-center opacity-100 z-50 pt-5 pb-5">
            <form v-on:submit="guardaTorneo">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Nombre del Torneo
                        </label>
                        <input name="name" v-model="nombreTorneo" type="text" placeholder="Ingresa el nombre completo" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />

                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Deporte
                        </label>
                        <div class="inline-block relative w-72">
                            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white leading-tight ">
                                <option>Selecciona un deporte</option>
                                <option v-for="(deporte,index) in deportes" v-bind:value="index">
                                    {{ deporte}}
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
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Cantidad de participantes x equipo
                        </label>
                        <input name="name" v-model="maxParticipantes" type="number" min="0" placeholder="Ingresa el nombre completo" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Fecha de Inicio
                        </label>
                        <input name="name" v-model="fechaInicio" type="date" placeholder="dd/mm/yyyy" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Fecha tentativa de finalización
                        </label>
                        <input name="name" v-model="fechaFinal" type="date" placeholder="dd/mm/yyyy" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Ramas
                        </label>
                        <div class="flex justify-start">
                            <div class="inline mr-5">
                                <input class=" h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="inlineCheckbox1" value="0" v-model="ramaSeleccionada">
                                <label class="form-check-label inline-block text-gray-800">Varonil</label>
                            </div>
                            <div class="inline mr-5">
                                <input class=" h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="inlineCheckbox2" value="1" v-model="ramaSeleccionada">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Femenil</label>
                            </div>
                            <div class="inline mr-5">
                                <input class=" h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="inlineCheckbox3" value="2" v-model="ramaSeleccionada">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox3">Mixta</label>
                            </div>
                            <div class="inline mr-5">
                                <input class=" h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="inlineCheckbox4" value="4" v-model="ramaSeleccionada">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox4">Todas</label>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Municipios
                        </label>
                        <div class="flex justify-start">
                            <div class="inline mr-5">
                                <input class=" h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="cbMun1" value="0" v-model="municipiosSeleccionados">
                                <label class="form-check-label inline-block text-gray-800">Mexicali</label>
                            </div>
                            <div class="inline mr-5">
                                <input class=" h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="cbMun2" value="1" v-model="municipiosSeleccionados">
                                <label class="form-check-label inline-block text-gray-800">Tijuana</label>
                            </div>
                            <div class="inline mr-5">
                                <input class=" h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="cbMun3" value="2" v-model="municipiosSeleccionados">
                                <label class="form-check-label inline-block text-gray-800">Ensenada</label>
                            </div>
                            <div class="inline mr-5">
                                <input class=" h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="cbMun4" value="4" v-model="municipiosSeleccionados">
                                <label class="form-check-label inline-block text-gray-800">Tecate</label>
                            </div>
                            <div class="inline mr-5">
                                <input class=" h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="cbMun5" value="5" v-model="municipiosSeleccionados">
                                <label class="form-check-label inline-block text-gray-800">Rosarito</label>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            ¿ Se aceptan externos?
                        </label>
                        <div class="flex justify-start">
                            <div class="inline mr-5">
                                <input class=" h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" value="0" v-model="externos">
                                <label class="form-check-label inline-block text-gray-800">Si</label>
                            </div>
                            <div class="inline mr-5">
                                <input class=" h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" value="1" v-model="externos">
                                <label class="form-check-label inline-block text-gray-800">No</label>
                            </div>

                        </div>
                    </div>




                </div>






                <div v-cloak>
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

               


        </div>

        <button type="submit" class="inline-block font-semibold bg-green-700 text-white text-sm tracking-widest px-8 py-4 mt-6 font-sans rounded-md" v-on:click="guardaTorneo">
            <i class="fas fa-save mr-3"></i> Guardar evento
        </button>

        </form>
    </div>


    <!--vue-->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var today = new Date();
        var app = new Vue({
            el: '#app',
            data: {
                url: 'http://localhost:8080/mona_fitness/public/',
                discountApplied: false,
                isCameraOpen: false,
                isPhotoTaken: false,
                isShotPhoto: false,
                isLoading: false,
                link: '#',
                picture: null,
                cantidad: 1,
                priceMonth: 850,
                totalPayment: 0.0,
                discountSelected: 0,
                descuento: 0.0,
                nutricion: 0,
                conceptoDescuento: "",
                scheduleSelected: 0,
                monthSelected: 0,
                planSelected: 0,
                fullName: "",
                phone: "",
                email: "",
                age: "",
                mensaje: "ESTO ES UNA PRUEBA",
                onError: false,
                onSuccess: false,
                nutricionSeleccionada: false,
                numeroTarjeta: "",
                plans: [

                ],
                costoNutricion: 400,

                schedule: [],
                meses: [
                    "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
                ],
                deportes: [
                    "Beisbol", "Futbol Asociacion", "Futbol 7", "Fut-Tenis"
                ],
                deporteSeleccioado: 0,
                maxParticipantes: 0,
                nombreTorneo: "",
                fechaInicio: "",
                fechaFinal: "",
                ramaSeleccionada: [],
                municipiosSeleccionados: [],
                externos: '',
                esDeporteEquipo: true,
                test: "hola"


            },
            methods: {
                calcTotal: function() {
                    console.log(this.nutricionSeleccionada);
                    //console.log("total");
                    //console.log(this.planSelected);
                    var costo = this.discountApplied ? parseFloat(this.descuento) : this.planSelected == 0 ? 0 : this.plans.find(item => item.value === this.planSelected).costo;

                    if (costo >= 0)
                        costo = costo * (this.cantidad);

                    if (this.nutricionSeleccionada && parseInt(this.nutricion) > 0) {
                        this.totalPayment = costo + this.costoNutricion * parseInt(this.nutricion);
                    } else {
                        this.totalPayment = costo;
                    }






                },
                guardaTorneo: function(e) {

                    console.log(this.municipiosSeleccionados);
                    console.log(this.ramaSeleccionada);
                    e.preventDefault();


                },

                showAlert: function(message, code) {
                    this.mensaje = message;
                    if (code == 1) {
                        this.onSuccess = true;

                        setTimeout(() => this.reiniciaCampos(), 2000);
                    } else {
                        this.onError = true;
                    }
                    //               this.mensa
                },

                reiniciaCampos: function() {
                    this.discountApplied = false;
                    this.isCameraOpen = false;
                    this.isPhotoTaken = false;
                    this.isShotPhoto = false;;
                    this.isLoading = false;
                    this.link = '#';
                    this.picture = null;
                    this.cantidad = 1;
                    //this.priceMonth = 850;
                    this.totalPayment = 0.0;
                    this.discountSelected = 0;
                    this.descuento = 0.0;
                    this.conceptoDescuento = "";
                    this.scheduleSelected = 1;
                    this.planSelected = 0;
                    this.fullName = "";
                    this.phone = "";
                    this.age = "";
                    this.email = "";
                    this.mensaje = "";
                    this.onError = false;
                    this.onSuccess = false;
                    this.nutricionSeleccionada = false;
                    this.nutricion = 0;
                    this.stopCameraStream();

                },
                toggleCamera() {
                    if (this.isCameraOpen) {
                        this.isCameraOpen = false;
                        this.isPhotoTaken = false;
                        this.isShotPhoto = false;
                        this.stopCameraStream();
                    } else {
                        this.isCameraOpen = true;
                        this.createCameraElement();
                    }
                },

                createCameraElement() {
                    this.isLoading = true;

                    const constraints = (window.constraints = {
                        audio: false,
                        video: {
                            width: 250,
                            height: 337.5

                        },

                    });


                    navigator.mediaDevices
                        .getUserMedia(constraints)
                        .then(stream => {
                            this.isLoading = false;
                            this.$refs.camera.srcObject = stream;
                        })
                        .catch(error => {
                            this.isLoading = false;
                            alert("May the browser didn't support or there is some errors.");
                        });
                },

                stopCameraStream() {
                    let tracks = this.$refs.camera.srcObject.getTracks();

                    tracks.forEach(track => {
                        track.stop();
                    });
                },
                getHorarios() {
                    axios.get(this.url + "allHorarios").then(response => {
                        if (response.data.success) {
                            var horarios = response.data.resp;
                            horarios.forEach(element => {
                                //console.log(element);
                                var inicio = moment("1989-01-01 " + element.startHour).format('LT');
                                var final = moment("1989-01-01 " + element.endHour).format('LT');
                                if (element.fullName) {
                                    var horarioFixed = inicio + " - " + final + "( INSTRUCTORA: " + element.fullName + " )";
                                } else {
                                    var horarioFixed = inicio + " - " + final;
                                }

                                this.schedule.push({
                                    horario: horarioFixed,
                                    idClass: element.idClass
                                });
                            });
                            // v.noResult()

                        }
                    })
                },
                getPlans() {
                    axios.get(this.url + "allPlans").then(response => {
                        if (response.data.success) {
                            var plans = response.data.resp;
                            el = 0;
                            plans.forEach(element => {

                                this.plans.push({
                                    text: element.plan.toUpperCase(),
                                    value: element.idPlan,
                                    costo: parseFloat(element.amount),
                                });
                                el++;
                            });
                            // v.noResult()

                        }
                    })
                },

                takePhoto() {
                    if (!this.isPhotoTaken) {
                        this.isShotPhoto = true;

                        const FLASH_TIMEOUT = 50;

                        setTimeout(() => {
                            this.isShotPhoto = false;
                        }, FLASH_TIMEOUT);
                    }

                    this.isPhotoTaken = !this.isPhotoTaken;

                    const context = this.$refs.canvas.getContext('2d');
                    context.drawImage(this.$refs.camera, 0, 0, 250, 337.5);
                },

                downloadImage() {
                    const download = document.getElementById("downloadPhoto");
                    const canvas = document.getElementById("photoTaken").toDataURL("image/jpeg")
                        .replace("image/jpeg", "image/octet-stream");
                    download.setAttribute("href", canvas);
                },
                setThisMonth() {
                    var date = new Date().getMonth();
                    this.monthSelected = date;
                },
                clicCheckbox() {
                    this.nutricionSeleccionada = !this.nutricionSeleccionada;
                    this.calcTotal();
                }


            },

            mounted() {
                // this.getPlans();
                //this.getHorarios();
                //this.setThisMonth();


            }






        })
    </script>
</div>

</body>




</html>