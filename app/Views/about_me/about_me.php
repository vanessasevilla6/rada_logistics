<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RADA LOGISTICS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="<?php echo base_url() ?>/css/rada_style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/vue@next"></script>
</head>

<body>
    <div id="app">
        <nav id="header" class="relative w-full z-30 top-0 text-white bg-white shadow">

            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">

                <div class="pl-4 flex items-center">
                    <a class="toggleColour no-underline hover:no-underline font-bold text-2xl lg:text-4xl text-gray-800" href="#">
                        <!--Icon from: http://www.potlabicons.com/ -->

                        <img class="h-24 fill-current inline" src="<?php echo base_url() ?>/img/logos/rada.png">

                    </a>
                </div>

                <div class="block lg:hidden pr-4">
                    <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-800 hover:border-teal-500 appearance-none focus:outline-none">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                        </svg>
                    </button>
                </div>

                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 lg:bg-transparent text-black p-4 lg:p-0 z-20 bg-white" id="nav-content">
                    <ul class="list-reset lg:flex justify-end flex-1 items-center bebas-font">
                        <li class="mr-3">
                            <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="#">Active</a>
                        </li>
                        <li class="mr-3">
                            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#">link</a>
                        </li>
                        <li class="mr-3">
                            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#">link</a>
                        </li>
                        <li class="mr-3">
                            <a v-on:click="change_lang(default_language)" class="inline-block no-underline hover:text-gray-800 hover:text-underline py-2 px-4 text-red-rada" href="#"><i class="fa-solid fa-globe"></i> {{default_language}}</a>
                        </li>
                    </ul>

                </div>
            </div>

            <hr class="border-b border-gray-100 opacity-25 my-0 py-0">
        </nav>
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
            <div class="absolute top-0 w-full h-full bg-center bg-cover bg-no-repeat" style="background-image: url(<?php echo base_url() ?>/img/camion_aboutme.jpg)">
                <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
            </div>
            <div class="container relative mx-auto">
                <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-1/3 px-4 ml-auto mr-auto text-center  font-bold bebas-font text-white text-6xl  ">

                    {{info.heading}}
                    </div>
                </div>
            </div>

        </div>
        <div class="w-full h-full text-center justify-center font-bold text-xl   mx-auto place-items-center  ">
          <div class="flex w-full h-full">

              <div id="filosofia" class="bg-red-rada  w-2/3 place-content-center text-center p-20 ">
                <p class="tracking-widest text-white font-semibold text-4xl mb-12 font-bold oswald-font">{{info.abouttitle}}</p>
                <p class="text-white w-full tracking-widest font-bold oswald-font mb-10 pr-4">{{info.about}}</p>

              </div>
              <div class="w-1/3">
               <img class="w-full h-full bg-no-repeat  " style="background-image: url(<?php echo base_url() ?>/img/filosofia.jpg)">
               </div>
          </div>
        </div>

        <div class="w-full h-full  font-bold text-xl   mx-auto  ">
          <div class="flex w-full h-full">

              <div id="filosofia" class="bg-black  w-1/2 pt-20 ">
                <p class="pl-28 tracking-widest text-white font-semibold text-4xl mb-12 font-bold bebas-font">{{info.philosophy1}}</p>
                <p class="pl-28 text-white w-full tracking-widest font-bold bebas-font mb-10">{{info.philosophy2}}</p>
                <p class="pl-28 text-white w-full tracking-widest text-sm font-bold bebas-font">{{info.philosophy3}}</p>

              </div>
              <div id="filosofia" class="bg-gray-rada  w-1/2    p-20 ">
                <p class="tracking-widest text-white font-semibold text-4xl mb-10 font-bold bebas-font">SERVICIOS</p>
                <ul class="list-reset justify-end flex-1  bebas-font">
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline hover:bg-red-600 rounded text-underline py-2 px-2">Almacenamiento de contendores</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline  hover:bg-red-600 rounded text-underline py-2 px-2">Reparación y mantenimiento de Tracto camiones</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline  hover:bg-red-600 rounded text-underline py-2 px-2">Llantero </a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline  hover:bg-red-600 rounded text-underline py-2 px-2">Renta de contenedores 53 pies</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline  hover:bg-red-600 rounded text-underline py-2 px-2">Fletes Locales y Nacionales </a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline hover:bg-red-600 rounded text-underline py-2 px-2">Servicio de transporte interno (Maquilas) </a>
                    </li>
                </ul>
              </div>
          </div>
        </div>

        <div class="bg-gray-100 py-10 px-24">
          <div class="grid grid-cols-3 gap-3  ">
            <div class=" justify-center  ">
              <img class="w-1/4  p-1 mx-auto mb-10" src="<?php echo base_url() ?>/img/logos/mision.png">
              <p class="text-center font-bold tracking-widest">MISIÓN </p>
            </div>
            <div class="justify-center  ">
              <img class="w-1/4  p-1 mx-auto mb-10" src="<?php echo base_url() ?>/img/logos/testigo.png">
              <p class="text-center font-bold tracking-widest">VISIÓN</p>
            </div>
            <div class=" justify-center  ">
              <img class="w-1/4  p-1 mx-auto mb-10" src="<?php echo base_url() ?>/img/logos/valor.png">
              <p class="text-center font-bold tracking-widest">VALORES</p>
              <p class="text-center tracking-widest text-sm font-bold bebas-font">Mejora continua, ética, lealtad, sentimiento de pertenencia, trabajo en equipo, contribución social, individual y colectiva.
</p>
            </div>
          </div>
        </div>

    </div>
</body>






<script type="module">

   import en_lang from '<?php echo base_url()?>/json_info/english.json' assert { type: "json" };;
   import es_lang from '<?php echo base_url()?>/json_info/spanish.json' assert { type: "json" };;


    const {
        createApp
    } = Vue;
    const application = createApp({
        data() {
            return {
                url: "<?php echo base_url(); ?>",
                default_language: 'en',
                default_language_index: 0,
                languages: {
                    es:es_lang,
                    en:en_lang
                },

                info: null,
            }
        },
        beforeMount(){
            this.info = this.languages.en;
            console.log(this.info.about);
        },
        methods:{
            change_lang(lang){
                if(lang=='en'){
                    this.default_language= 'es';
                    this.info=this.languages.es;

                }else{
                    this.default_language= 'en';
                    this.info=this.languages.en;
                }
            }
        }

    });
    application.mount('#app')
</script>



</html>
