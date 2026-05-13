/**
 * Application Portfolio - Frontend JS
 * Charge les données via l'API PHP
 */

// Déterminer l'URL de base de l'API
const isProduction = window.location.hostname !== 'localhost';
const apiBase = isProduction ? '/api' : 'http://localhost:8000/api';

/**
 * Charger les données du profil
 */
async function loadProfile() {
    try {
        const response = await fetch(`${apiBase}/profile`);
        if (!response.ok) throw new Error('Erreur profil');
        const profile = await response.json();
        renderProfile(profile);
    } catch (error) {
        console.error('Erreur chargement profil:', error);
    }
}

/**
 * Charger les projets
 */
async function loadProjects() {
    try {
        const response = await fetch(`${apiBase}/projects`);
        if (!response.ok) throw new Error('Erreur projets');
        const projects = await response.json();
        renderProjects(projects);
    } catch (error) {
        console.error('Erreur chargement projets:', error);
    }
}

/**
 * Charger les compétences
 */
async function loadSkills() {
    try {
        const response = await fetch(`${apiBase}/skills`);
        if (!response.ok) throw new Error('Erreur compétences');
        const skills = await response.json();
        renderSkills(skills);
    } catch (error) {
        console.error('Erreur chargement compétences:', error);
    }
}

/**
 * Rendu du profil
 */
function renderProfile(profile) {
    const sidebar = document.getElementById('sidebar');
    if (!sidebar || !profile) return;
    
    sidebar.innerHTML = `
        <div class="profile-card">