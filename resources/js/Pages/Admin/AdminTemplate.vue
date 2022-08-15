<template>
    <MainTemplate>
        <div class="container">
            <ul class="navigation">
                <li>
                    <Link href="/admin/schools"
                          class="navigation-tab"
                          :class="{'active' : isUrl('schools')}">
                        Škole
                    </Link>
                </li>
                <li>
                    <Link href="/admin/questionnaires"
                          class="navigation-tab"
                          :class="{'active' : isUrl('questionnaires')}">
                        Upitnici
                    </Link>
                </li>
                <li>
                    <Link href="/admin/users"
                          class="navigation-tab"
                          :class="{'active' : isUrl('users')}">
                        Korisnici
                    </Link>
                </li>
            </ul>
            <div class="content-wrap">
                <slot/>
            </div>
        </div>
    </MainTemplate>
</template>

<script>
import MainTemplate from "../../Shared/MainTemplate.vue";

export default {
    name: "AdminTemplate",
    components: { MainTemplate },
    methods: {
        isUrl(...urls) {
            let currentUrl = this.$page.url.substr(1);
            if (urls[0] === '') {
                return currentUrl === '';
            }
            return urls.filter((url) => currentUrl.includes(url)).length;
        },
    },
}
</script>

<style scoped>
.navigation {
    display: flex;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
    border-bottom: 1px solid var(--light-gray);
    user-select: none;
}
.navigation-tab {
    display: block;
    padding: 0 20px;
    color: var(--blue);
    text-decoration: none;
    margin-bottom: -1px;
    background: 0 0;
    border: 1px solid transparent;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    line-height: 40px;
}
.navigation-tab:hover {
    text-decoration-line: underline;
}
.navigation-tab.active {
    color: var(--dark-blue);
    background-color: white;
    font-weight: bold;
    border-color: var(--light-gray) var(--light-gray) white;
}
.content-wrap {
    padding: 20px 5px 0 5px;
}
</style>
