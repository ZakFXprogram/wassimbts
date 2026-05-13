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
            <h1>${profile.name || 'Wassim DAHMY'}</h1>
            <p class="title">${profile.title || 'Développeur Full Stack'}</p>
            <div class="contact">
                ${profile.email ? `<a href="mailto:${profile.email}">${profile.email}</a>` : ''}
                ${profile.phone ? `<a href="tel:${profile.phone}">${profile.phone}</a>` : ''}
            </div>
            ${profile.bio ? `<p class="bio">${profile.bio}</p>` : ''}
        </div>
    `;
}

/**
 * Rendu des projets
 */
function renderProjects(projects) {
    const content = document.getElementById('content');
    if (!content || !projects || Object.keys(projects).length === 0) return;
    
    let html = '<section class="projects"><h2>Mes projets</h2>';
    for (const [key, project] of Object.entries(projects)) {
        html += `
            <div class="project-card" data-project="${key}">
                <h3>${project.title || 'Projet sans titre'}</h3>
                <p class="period">${project.period || ''}</p>
                <p class="category">${project.category || ''}</p>
                <p class="context">${project.context || ''}</p>
                ${project.techs && project.techs.length > 0 ? `<div class="techs">${project.techs.map(tech => `<span class="tag">${tech}</span>`).join('')}</div>` : ''}
            </div>
        `;
    }
    html += '</section>';
    content.innerHTML = html;
}

/**
 * Rendu des compétences
 */
function renderSkills(skills) {
    const content = document.getElementById('content');
    if (!content || !skills || Object.keys(skills).length === 0) return;
    
    let html = '<section class="skills"><h2>Compétences</h2><table><thead><tr><th>Code</th><th>Description</th></tr></thead><tbody>';
    for (const [code, skill] of Object.entries(skills)) {
        html += `<tr><td>${code}</td><td>${skill}</td></tr>`;
    }
    html += '</tbody></table></section>';
    content.innerHTML = html;
}

/**
 * Initialiser l'app au chargement
 */
document.addEventListener('DOMContentLoaded', () => {
    loadProfile();
    loadProjects();
});
