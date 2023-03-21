module.exports = {
    env: {
        browser: true,
        es2021: true,
    },
    extends: ['eslint:recommended', 'plugin:vue/vue3-essential', 'prettier'],
    overrides: [],
    parserOptions: {
        ecmaVersion: 'latest',
    },
    plugins: ['vue', 'prettier'],
    rules: {
        'vue/multi-word-component-names': 'off',
        'no-undef': 'off',
    },
}
