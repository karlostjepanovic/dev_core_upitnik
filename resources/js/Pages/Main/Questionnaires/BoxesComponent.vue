<template>
    <div class="boxes">
        <div class="boxes-wrap" ref="boxes-wrap" v-bind:class="{'reverse' : !asc}">
            <div class="box" v-for="(i, j) in 5" @click="select($event, j)">
                <span>{{j}}</span>
            </div>
        </div>
        <input
            class="input"
            type="hidden"
            :value="modelValue"
            v-on:input="updateValue($event)">
    </div>
</template>

<script>
export default {
    name: "BoxesComponent",
    props: {
        modelValue: {
            type: Number,
        },
        asc: {
            type: Boolean
        }
    },
    methods: {
        updateValue: function (event) {
            this.$emit('update:modelValue', event.target.value);
        },
        select(e, i) {
            if(e.target.classList.contains('selected')){
                e.target.classList.remove('selected');
                this.$emit('update:modelValue', null);
            }else{
                let boxBoxes = Array.from(this.$refs["boxes-wrap"].children);
                boxBoxes.forEach((box) => {
                    box.classList.remove('selected');
                });
                e.target.classList.add('selected');
                this.$emit('update:modelValue', i);
            }
        }
    },
}
</script>

<style scoped>
.boxes-wrap {
    display: flex;
    align-items: center;
    flex-direction: row;
    height: 100%;
    gap: 10px;
    padding: 10px 0;
    justify-content: left;
}

.boxes-wrap.reverse {
    flex-direction: row-reverse;
}

.box {
    width: 50px;
    line-height: 240%;
    font-weight: bold;
    cursor: pointer;
    border: 1px solid var(--light-gray);
    color: var(--gray);
    border-radius: 4px;
    font-size: 120%;
    background: #F9FAFE;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: bottom 150ms, box-shadow 250ms;
    position: relative;
}

.box span {
    user-select: none;
    pointer-events: none;
}

.box:hover {
    border-color: var(--blue);
    background: #f6f6fa;
}

.box:active,
.box.selected {
    color: var(--dark-blue);
    border-color: var(--dark-blue);
    box-shadow: 0 0 0 4px var(--second-blue);
    background: white;
}
</style>
