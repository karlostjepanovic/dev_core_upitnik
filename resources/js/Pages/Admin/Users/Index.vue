<template>
    <div>
        <div class="title-section">
            <Link class="button blue" href="/admin/users/create">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                </svg>
                Kreiraj korisnika
            </Link>
        </div>
        <div class="table-wrap" v-if="users.length">
            <table>
                <thead>
                    <tr>
                        <th>Korisnik</th>
                        <th>Korisničko ime</th>
                        <th>Adresa e-pošte</th>
                        <th>OIB</th>
                        <th>Administrator</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id" class="hover">
                        <td>{{ user.firstname+' '+user.lastname }}</td>
                        <td>{{ user.username }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.oib }}</td>
                        <td>
                            <svg style="width:16px;height:16px" viewBox="0 0 24 24" class="txt-green" v-if="user.is_admin">
                                <path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                            </svg>
                            <svg style="width:16px;height:16px" viewBox="0 0 24 24" class="txt-red" v-else>
                                <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                            </svg>
                        </td>
                        <td>
                            <EditObject :id="user.id" path="show"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="txt-bold" v-else>Trenutno ne postoji ni jedan korisnik za prikaz!</div>
    </div>
</template>

<script>
import AdminTemplate from "../AdminTemplate.vue";
import EditObject from "../../../Shared/EditObject.vue";
import {Link} from '@inertiajs/inertia-vue3';

export default {
    name: "Index",
    components: {Link, EditObject},
    layout: AdminTemplate,
    props: {
        users: Array,
    },
}
</script>

<style scoped>

</style>
