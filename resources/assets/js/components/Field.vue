<template>
    <div :class="['form-group', {'has-error' : error}]">
        <slot></slot>
        <span class="help-block" v-if="error" v-text="error"></span>
    </div>
</template>

<script>
    export default {
        name: 'Field',
        props: ['name', 'error']
    }
</script>
