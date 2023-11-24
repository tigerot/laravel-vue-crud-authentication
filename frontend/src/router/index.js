import { createRouter, createWebHistory } from "vue-router";
import { getAuth, onAuthStateChanged } from "firebase/auth";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: "/", component: () => import("../components/Home.vue") },
        { path: "/register", component: () => import("../components/Register.vue") },
        { path: "/sign-in", component: () => import("../components/SignIn.vue") },
        { 
            path: "/vehicles",
            component: () => import("../components/VehicleView.vue"),
            meta: {
                requiresAuth: true
            }
        }
    ]
});

const getCurrentUser = () => {
    return new Promise((resolve, reject) => {
        const removeListener = onAuthStateChanged(
            getAuth(),
            (user) => {
                removeListener();
                resolve(user);
            },
            reject
        )
    })
}

router.beforeEach(async(to, from, next) => {
    if(to.matched.some((record) => record.meta.requiresAuth)) {
        if(await getCurrentUser()) {
            next();
        } else {
            alert("you don't have access.");
            next("/");
        } 
    } else {
        next();
    }
});

export default router;