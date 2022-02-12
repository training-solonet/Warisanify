<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('Style/css/profil') }}">
    <title>Document</title>
</head>
<body>
    <!-- <div class=""> -->
        <div class="">
            <div class="container mx-auto my-5 p-5 ">
                <div class="md:flex no-wrap md:-mx-2 ">
                    <!-- {/* left side */} -->
                    <div class="w-full
                    sm:w-1
                    md:w-3/12
                    md:mx-2">
                        <div class="bg-white rounded-md items-center p-4 shadow-md shadow-slate-300 ">
                            <div class="flex sm:justify-items-center flex-col md:flex-row border-b-2">
                                <div class="mx-auto md:mx-0 flex justify-center items-center">
                                    <!-- {/* <imgProfile /> */} -->
                                    <!-- {/* <img src={"../../public/default.jpg"} alt="gmbr_prf" /> */} -->
                                    <img src="img/default.jpg" alt="gmbr_prf" class="object-center rounded-lg md:rounded-full h-28 w-28 sm:w-14 sm:h-14" />
                                </div>
                                <div class="flex flex-col my-4">
                                    <h6 class="flex-auto text-center font-bold m-1">Nama User</h6>
                                    <button class="bg-amber-700 text-center text-white m-1 rounded-full px-3 font-thin">Edit Profile</button>
                                </div>

                            </div>

                            <div class="">
                                <div class="flex items-center text-justify p-2">
                                    <!-- <MdFavorite /> -->
                                    Favorit
                                </div>
                                <div class="flex items-center p-2">
                                    <!-- <MdShoppingCart /> -->
                                    Cart
                                </div>
                                <div class="flex items-center p-2">
                                    <!-- <MdOutlineHistory /> -->
                                    History
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- {/* end-left-side */} -->

                    <!-- {/* right side */} -->
                    <div class="p-4 border-2">
                        <div class="bg-white p-3  shadow-sm rounded-md">
                            <div class="flex border-b-2 items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <!-- <FaUserAlt /> -->
                                <span class="tracking-wide">My Profile</span>
                            </div>

                            <div>
                                <div class="sm:flex text-gray-700 w-fit">

                                    <div class="flex-2 p-4 shadow-md shadow-slate-400 rounded-md mt-4">
                                        <div class="flex justify-center items-center">
                                            <img src="img/default.jpg" alt="" class="object-none object-center w-65 h-65 rounded-md" />
                                        </div>
                                        <!-- {/* <Button class="">Pilih Foto</Button> */} -->
                                        <div class="my-2 text-center box-border hover:box-content bg-amber-400 text-white font-bold rounded-md px-4 py-2">Pilih Foto</div>
                                    </div>

                                    <div class="flex-1 md:mx-2 ">
                                        <div class="grid grid-flow-row text-md p-4">
                                            <div class="grid grid-cols-2">
                                                <div class="px-4  py-2 font-semibold">First Name</div>
                                                <div class="px-4 py-2">Nama Awal</div>
                                            </div>
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Last Name</div>
                                                <div class="px-4 py-2">Nama Akhir</div>
                                            </div>
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Gender</div>
                                                <div class="px-4 py-2">Male/Female</div>
                                            </div>
                                            <div class="grid grid-cols-2 ">
                                                <div class="px-4 py-2 font-semibold">Email</div>
                                                <div class="px-4  py-2">Gooogle@gmail.com </div>
                                            </div>
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Phone Number</div>
                                                <div class="px-4 py-2">+6209762738</div>
                                            </div>
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Address</div>
                                                <div class="px-4 py-2"> Jl. Arifin No.129, Kepatihan Kulon, Kec. Jebres, Kota Surakarta, Jawa Tengah 57129</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- {/* end-right-side */} -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
</body>
</html>
