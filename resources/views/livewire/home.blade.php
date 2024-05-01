<x-app-layout>
    <div>
        <div class="container main-container">
            <!-- ------------------------------------------- Inicio Sección Izquierda ------------------------------------------- -->
            <div class="main-left">
                <!-- -------------------- Perfil -------------------- -->
                <a href="" class="profile">
                    <div class="profile-picture" id="my-profile-picture">
                        <img src="" alt="" />
                    </div>
                    <div class="profile-handle">
                        <h4>Nombre Apellido</h4>
                        <p class="text-gry">@nombreUsuario</p>
                    </div>
                </a>

                <!-- ------------------------------------------- Inicio Aside ------------------------------------------- -->
                <aside>
                    <a href="" class="menu-item active">
                        <span><img src="https://cdn.hugeicons.com/icons/home-01-stroke-rounded.svg" alt="home-01"
                                width="48" height="48" />
                        </span>
                        <h3>Home</h3>
                    </a>
                    <a href="" class="menu-item">
                        <span> <img src="https://cdn.hugeicons.com/icons/user-stroke-rounded.svg" alt="user"
                                width="48" height="48" />
                        </span>
                        <h3>My Profile</h3>
                    </a>
                    <a href="" class="menu-item">
                        <span><img src="https://cdn.hugeicons.com/icons/view-stroke-rounded.svg" alt="view"
                                width="48" height="48" /></span>
                        <h3>Explore</h3>
                    </a>
                    <a href="" class="menu-item">
                        <span><img src="https://cdn.hugeicons.com/icons/notification-01-stroke-rounded.svg"
                                alt="notification-01" width="48" height="48" /></span>
                        <h3>Notifications</h3>
                    </a>
                    <a href="" class="menu-item">
                        <span><img src="https://cdn.hugeicons.com/icons/message-02-stroke-rounded.svg" alt="message-02"
                                width="48" height="48" /></span>
                        <h3>Messages</h3>
                    </a>
                    <a href="" class="menu-item" id="theme">
                        <span><img src="https://cdn.hugeicons.com/icons/paint-board-stroke-rounded.svg"
                                alt="paint-board" width="48" height="48" /></span>
                        <h3>Theme</h3>
                    </a>
                </aside>
                <!-- ------------------------------------------- Fin Aside ------------------------------------------- -->
            </div>
            <!-- ------------------------------------------- Fin Sección Izquierda ------------------------------------------- -->

            <!-- ------------------------------------------- Inicio Sección Principal ------------------------------------------- -->
            <div class="main-middle">
                <!-- ------------------------------------------- Inicio Feed Aria ------------------------------------------- -->
                <div class="feeds">
                    <div class="feed myfeed">
                        <div class="feed-top">
                            <div class="user">
                                <div class="profile-picture">
                                    <img src="" alt="" />
                                </div>
                                <div class="info">
                                    <h3>Nombre Apellido</h3>
                                    <div class="time text-gry">
                                        <small> Hace <span> x horas</span> </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="feed-img">
                            <img src="" alt="" />
                        </div>
                        <div class="action-button">
                            <div class="interaction-button">
                                <span><i class="fas fa-heart liked"></i></span>
                                <span><i class="fa-regular fa-comment-dots"></i></span>
                                <span><i class="fa-solid fa-link"></i></span>
                            </div>
                        </div>
                        <div class="liked-by">
                            <span><img src="" alt="" /></span>
                            <span><img src="" alt="" /></span>
                            <p>Liked By <b>Nombre Apellido </b> and <b>77</b> others</p>
                        </div>
                        <div class="caption">
                            <p>
                                <b>Nombre Apellido</b>Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Sed dignissimos nihil cupiditate sit facilis
                                exercitationem, voluptatum natus aspernatur deleniti earum
                                illo. Facilis nobis quisquam nihil aliquid, deserunt veritatis
                                quam provident?
                                <span class="hars-tag">#prueba</span>
                            </p>
                        </div>
                        <div class="comments text-gry">View all comments</div>
                    </div>

                </div>
                <!-- ------------------------------------------- Fin Feed Aria  ------------------------------------------- -->
            </div>
            <!-- ------------------------------------------- Fin Sección Principal ------------------------------------------- -->

            <!-- ------------------------------------------- Inicio Sección Derecha ------------------------------------------- -->
            <div class="main-right">
                <div class="notifications">
                    <h4>Notificactions</h4>
                    <div class="notifications-search-bar">
                        <i class="fas fa-search"></i>
                        <input type="search" placeholder="Search user" id="notifications-search">
                    </div>
                    <div class="my-notifications">
                        <div class="notification">
                            <div class="profile-picture">
                                <img src="" alt="">
                            </div>
                            <div class="notification-body">
                                <h5>Nombre Usuario</h5>
                                <p class="text-gry">follows you.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ------------------------------------------- Fin Sección Derecha ------------------------------------------- -->
        </div>

    </div>
</x-app-layout>
