<template>
    <div class="interface">
        <div class="header">
            <Link href="/" class="logo-wrap">
                CORE upitnik
            </Link>
            <div class="user-wrap" @click="toggleDropdown">
                <div class="container">
                    <div class="user">{{ $page.props.auth.username }}</div>
                    <div class="arrow">
                        <svg style="width:20px;height:20px" viewBox="-2 -2 24 24">
                            <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="header">
                        <div class="user-data">
                            <div class="txt-large">{{ $page.props.auth.firstname + ' ' + $page.props.auth.lastname }}</div>
                            <div class="txt-small">{{ $page.props.auth.email }}</div>
                        </div>
                        <div class="logout-btn">
                            <a href="/logout">
                                <button type="button"
                                        class="red">
                                    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M16.56,5.44L15.11,6.89C16.84,7.94 18,9.83 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12C6,9.83 7.16,7.94 8.88,6.88L7.44,5.44C5.36,6.88 4,9.28 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12C20,9.28 18.64,6.88 16.56,5.44M13,3H11V13H13" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                    <ul class="options">
                        <li><Link href="/">Početna stranica</Link></li>
                        <li><Link href="/profile">Korisnički račun</Link></li>
                        <li><Link href="/change-password">Promjena lozinke</Link></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="view">
            <div class="content-wrap">
                <Messages />
                <slot />
            </div>
        </div>
    </div>
</template>

<script>
import Messages from "./Messages.vue";

export default {
    name: "MainTemplate",
    components: { Messages },
    methods: {
        toggleDropdown(e){
            const item = e.target;
            item.classList.toggle('active');
            window.addEventListener('click', function(e){
                if (e.target !== item){
                    return item.classList.remove('active');
                }
            });
        },
    }
}
</script>

<style scoped>
.header {
    position: sticky;
    z-index: 100;
    width: 100%;
    height: 60px;
    left: 0;
    top: 0;
    background: var(--blue);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1em;
    color: white;
}
.logo-wrap {
    font-size: 1.5em;
    font-weight: bold;
    color: white;
    text-decoration-line: none;
}
.logo-wrap:hover {
    color: var(--light-blue);
}
.user-wrap {
    text-align: right;
    user-select: none;
}

.view {
    padding: 20px;
    max-width: 1150px;
    margin: 0 auto;
}

.content-wrap {
    width: 100%;
}

.user-wrap {
    position: relative;
    cursor: pointer;
}

.user-wrap:hover .container {
    color: var(--light-blue);
    text-decoration-line: underline;
}

.user-wrap .container {
    display: flex;
    align-items: center;
    pointer-events: none;
}

.dropdown {
    margin-left: -180px;
    position: absolute;
    top: calc(100% + 10px);
    right: -10px;
    box-shadow: 0 4px 10px 0 rgb(0 0 0 / 40%);
    border-radius: 4px;
    pointer-events: none;
    opacity: 0;
    width: 300px;
    cursor: default;
}

.user-wrap.active .dropdown {
    pointer-events: all;
    opacity: 1;
    animation: growDown 150ms ease-in-out forwards;
    transform-origin: top center;
}

.dropdown:before {
    content: "";
    border-bottom: 8px solid var(--dark-blue);
    border-right: 8px solid transparent;
    border-left: 8px solid transparent;
    position: absolute;
    top: -8px;
    right: 10px;
}
.dropdown .header {
    background: var(--dark-blue);
    color: white;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}

.dropdown .header .user-data {
    text-align: left;
}

.dropdown .header button {
    font-size: 110%;
    padding: 0;
    width: 30px;
    line-height: 30px;
    min-height: 30px;
}

.dropdown .header button svg {
    margin: unset!important;
}

.dropdown .options {
    background: white;
    list-style: none;
    text-align: left;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    overflow: hidden;
}

.dropdown .options li a {
    display: block;
    width: 100%;
    padding: 10px 16px;
    text-decoration-line: none;
    color: var(--black);
}

.dropdown .options li:not(:last-child) {
    border-bottom: 1px solid var(--light-gray);
}

.dropdown .options li:hover {
    background: #e5e5e5;
    text-decoration-line: underline;
}

@media screen and (max-width: 768px) {
    .view {
        padding: 10px;
    }
}

@keyframes growDown {
    0% {
        transform: scaleY(0);
    }
    80% {
        transform: scaleY(1.1);
    }
    100% {
        transform: scaleY(1);
    }
}
</style>
