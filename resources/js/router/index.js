import { createRouter , createWebHistory } from "vue-router";

import invoiceItem from '../components/invoice/index.vue';
import notFound from '../components/Notfound.vue'
import invoiceNew from '../components/invoice/new.vue';

const routes = [
    {
        path : '/',
        component : invoiceItem
    },
    {
        path : '/invoice/new',
        component : invoiceNew
    },
    {
        path : '/:pathMatch(.*)*',
        component : notFound
    }
]

const router  = createRouter({
    history  : createWebHistory(),
    routes
})

export default router
