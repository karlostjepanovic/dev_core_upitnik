<template>
    <div class="wrap">
        <div class="title-section">
            <div class="title">Promjena lozinke</div>
        </div>
        <div class="section txt-center txt-red" v-if="this.initial_password">Morate promijeniti inicijalnu lozinku!</div>
        <form @submit.prevent="changePassword">
            <div class="form-section">
                <div class="form-control">
                    <label for="current_password" class="required">Trenutna lozinka:</label>
                </div>
                <div class="form-control">
                    <div class="field">
                        <input type="password"
                               class="blue"
                               :class="{'invalid' : formData.errors && formData.errors.current_password}"
                               id="current_password"
                               v-model="formData.current_password">
                    </div>
                    <div class="error" v-if="formData.errors && formData.errors.current_password">{{formData.errors.current_password}}</div>
                </div>
            </div>
            <div class="form-section w-10">
                <div class="form-control">
                    <label for="new_password" class="required">Nova lozinka:</label>
                </div>
                <div class="form-control">
                    <div class="field">
                        <input type="password"
                               class="blue"
                               :class="{'invalid' : formData.errors && formData.errors.new_password}"
                               id="new_password"
                               v-model="formData.new_password">
                    </div>
                    <div class="error" v-if="formData.errors && formData.errors.new_password">{{formData.errors.new_password}}</div>
                </div>
            </div>
            <div class="form-section w-10">
                <div class="form-control">
                    <label for="repeat_password" class="required">Nova lozinka <i>(ponovno)</i>:</label>
                </div>
                <div class="form-control">
                    <div class="field">
                        <input type="password"
                               class="blue"
                               :class="{'invalid' : formData.errors && formData.errors.repeat_password}"
                               id="repeat_password"
                               v-model="formData.repeat_password">
                    </div>
                    <div class="error" v-if="formData.errors && formData.errors.repeat_password">{{formData.errors.repeat_password}}</div>
                </div>
            </div>
            <div class="form-section">
                <button
                    type="submit"
                    class="blue">
                    Promijeni lozinku
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import MainTemplate from "../../Shared/MainTemplate.vue";

export default {
    name: "ChangePassword",
    layout: MainTemplate,
    props: {
        initial_password: String
    },
    data() {
        return {
            formData:  this.$inertia.form({
                current_password: null,
                new_password: null,
                repeat_password: null,
            })
        }
    },
    methods: {
        changePassword() {
            this.formData.post(`/update-password`, {
                onSuccess: () => {
                    this.formData.reset();
                }
            });
        }
    }
}
</script>

<style scoped>

</style>
