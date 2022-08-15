import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import '../css/app.css';
import { InertiaProgress } from '@inertiajs/progress';
import { Link } from '@inertiajs/inertia-vue3';

InertiaProgress.init({
    color: '#fff'
});

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue');

        return (await pages[`./Pages/${name}.vue`]()).default;
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .mixin({ components: { Link } })
            .use(plugin)
            .mount(el)
    },
}).catch((error) => console.log(error));
