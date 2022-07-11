import {createRouter, createWebHistory} from 'vue-router'
import Home from '../view/Home'
import PatientDetails from '../view/PatientDetails'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/patient-details/:id',
        name: 'PatientDetails',
        component: PatientDetails,
        props: true
    }

]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router