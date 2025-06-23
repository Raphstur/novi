<div x-data="assistantChat()" 
     class="fixed bottom-6 right-6 z-[100]"
     x-init="init()">
     
    <!-- Bouton principal -->
    <button @click="toggleChat"
            class="relative bg-purple-600 text-white p-4 rounded-full shadow-lg hover:bg-purple-700 transition-all"
            :class="{ 'animate-bounce': hasNewMessage }"
            aria-label="Assistant chat">
        <div class="absolute inset-0 rounded-full border-2 border-purple-400 animate-ping opacity-75" 
             :class="{ 'hidden': !isPulsing }"></div>
        <i class="fas fa-robot text-xl"></i>
    </button>

    <!-- Fenêtre de chat -->
    <div x-show="isOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-4"
         class="fixed bottom-20 right-6 w-80 sm:w-96 h-96 bg-white rounded-lg shadow-xl border border-gray-200 flex flex-col"
         @click.away="closeChat">
         
        <!-- En-tête -->
        <div class="bg-purple-600 text-white p-4 rounded-t-lg flex justify-between items-center">
            <div class="flex items-center">
                <i class="fas fa-robot mr-2"></i>
                <h3 class="font-medium">Assistant SGVE</h3>
            </div>
            <button @click="closeChat" class="text-white hover:text-yellow-300">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <!-- Messages -->
        <div class="flex-1 p-4 overflow-y-auto bg-gray-50" x-ref="messagesContainer">
            <template x-for="(message, index) in messages" :key="index">
                <div :class="{
                    'bg-purple-100 rounded-lg rounded-tl-none mb-4 max-w-[80%]': message.type === 'bot',
                    'bg-yellow-100 rounded-lg rounded-tr-none mb-4 ml-auto max-w-[80%]': message.type === 'user'
                }">
                    <p class="text-sm text-gray-800 p-3" x-text="message.text"></p>
                </div>
            </template>
        </div>
        
        <!-- Zone de saisie -->
        <div class="p-4 border-t border-gray-200">
            <form @submit.prevent="sendMessage" class="flex items-center">
                <input x-model="newMessage"
                       type="text"
                       placeholder="Écrivez votre message..."
                       class="flex-1 border border-gray-300 rounded-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                       required>
                <button type="submit" class="ml-2 bg-purple-600 text-white rounded-full p-2 hover:bg-purple-700">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('assistantChat', () => ({
        isOpen: false,
        isPulsing: true,
        hasNewMessage: false,
        messages: [
            { 
                type: 'bot', 
                text: 'Bonjour, je suis l\'assistant virtuel du SGVE. Comment puis-je vous aider aujourd\'hui?' 
            }
        ],
        newMessage: '',

        init() {
            // Animation de pulsation toutes les 3 secondes
            setInterval(() => {
                this.isPulsing = !this.isOpen && !this.isPulsing;
            }, 3000);
        },

        toggleChat() {
            this.isOpen = !this.isOpen;
            if (this.isOpen) {
                this.hasNewMessage = false;
                this.$nextTick(() => {
                    this.$refs.messagesContainer.scrollTop = this.$refs.messagesContainer.scrollHeight;
                });
            }
        },

        closeChat() {
            this.isOpen = false;
        },

        sendMessage() {
            if (!this.newMessage.trim()) return;
            
            // Ajout du message utilisateur
            this.messages.push({
                type: 'user',
                text: this.newMessage
            });
            
            const userMessage = this.newMessage;
            this.newMessage = '';
            
            this.$nextTick(() => {
                this.$refs.messagesContainer.scrollTop = this.$refs.messagesContainer.scrollHeight;
                
                // Réponse automatique après 1 seconde
                setTimeout(() => {
                    this.messages.push({
                        type: 'bot',
                        text: this.generateResponse(userMessage)
                    });
                    
                    if (!this.isOpen) {
                        this.hasNewMessage = true;
                    }
                    
                    this.$nextTick(() => {
                        this.$refs.messagesContainer.scrollTop = this.$refs.messagesContainer.scrollHeight;
                    });
                }, 1000);
            });
        },

        generateResponse(message) {
            // Simulation d'une IA : réponses contextuelles sur le site
            const lowerMsg = message.toLowerCase();

            // Exemples de réponses personnalisées sur le site
            if (lowerMsg.includes('inscription partenaire')) {
                return "Pour vous inscrire comme partenaire, cliquez sur 'Inscription' puis remplissez le formulaire dédié aux partenaires.";
            } else if (lowerMsg.includes('inscription autorité')) {
                return "Pour inscrire une autorité, utilisez le formulaire d'inscription autorité accessible depuis la page d'accueil.";
            } else if (lowerMsg.includes('mot de passe oublié')) {
                return "Pour réinitialiser votre mot de passe, cliquez sur 'Mot de passe oublié' sur la page de connexion.";
            } else if (lowerMsg.includes('tableau de bord')) {
                return "Le tableau de bord vous permet de visualiser les signalements, les demandes de partenaires et d'autorités, ainsi que les statistiques du site.";
            } else if (lowerMsg.includes('signalement')) {
                return "Pour faire un signalement, rendez-vous sur la page 'Signalement' et remplissez le formulaire. Toutes les informations sont confidentielles.";
            } else if (lowerMsg.includes('contact')) {
                return "Pour contacter l'équipe, utilisez le formulaire de contact ou les informations disponibles en bas de page.";
            } else if (lowerMsg.includes('partenaire')) {
                return "Les partenaires sont des organisations ou personnes qui collaborent avec le SGVE. Vous pouvez en faire la demande via le formulaire partenaire.";
            } else if (lowerMsg.includes('autorité')) {
                return "Les autorités peuvent s'inscrire via le formulaire dédié. Elles ont accès à des fonctionnalités spécifiques dans le tableau de bord.";
            } else if (lowerMsg.includes('utilisateur')) {
                return "Les utilisateurs peuvent consulter les signalements, gérer leur profil et accéder à des ressources selon leur rôle.";
            } else if (lowerMsg.includes('statistiques')) {
                return "Les statistiques du site sont visibles sur le tableau de bord administrateur et permettent de suivre l'évolution des signalements et des partenaires.";
            } else if (lowerMsg.includes('aide') || lowerMsg.includes('support')) {
                return "Pour toute aide, posez votre question ici ou consultez la FAQ du site. Je suis là pour vous assister sur toutes les fonctionnalités du site.";
            } else if (lowerMsg.includes('connexion')) {
                return "Pour vous connecter, cliquez sur 'Connexion' en haut à droite et entrez vos identifiants.";
            } else if (lowerMsg.includes('déconnexion') || lowerMsg.includes('logout')) {
                return "Pour vous déconnecter, cliquez sur 'Déconnexion' dans le menu latéral ou en haut à droite.";
            } else if (lowerMsg.includes('profil')) {
                return "Vous pouvez modifier votre profil depuis la section 'Utilisateurs' ou en cliquant sur votre nom en haut à droite.";
            } else if (lowerMsg.includes('sécurité')) {
                return "Le site applique des mesures de sécurité avancées pour protéger vos données et vos signalements.";
            } else if (lowerMsg.includes('faq')) {
                return "La FAQ est accessible en bas de page et répond aux questions fréquentes sur le fonctionnement du site.";
            } else {
                return "Je suis l'assistant virtuel du site SGVE. Posez-moi toute question sur l'utilisation du site, les inscriptions, les signalements, ou les fonctionnalités. Je vous répondrai avec plaisir !";
            }
        }
    }));
});
</script>

<style>
.animate-bounce {
    animation: bounce 1s infinite;
}
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
</style>