<div class="p-4 bg-white dark:bg-gray-800 shadow rounded-lg">
    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Your Invitation Link</h3>
    <p class="text-sm text-gray-500 dark:text-gray-400">Use this link to invite new employees to register:</p>
    
    <div class="mt-2 flex items-center">
        <input type="text" 
               id="invitation-link" 
               value="{{ url('/request-add-employee/' . auth()->user()->id) }}" 
               class="form-input border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-100 rounded-md w-full text-sm" 
               readonly>
        <button onclick="copyToClipboard()" 
                class="ml-2 bg-blue-500 hover:bg-blue-600 text-white dark:bg-blue-600 dark:hover:bg-blue-700 px-3 py-2 rounded-md text-sm">
            Copy
        </button>
    </div>
</div>

<script>
    function copyToClipboard() {
        const invitationLink = document.getElementById('invitation-link');
        invitationLink.select();
        invitationLink.setSelectionRange(0, 99999); // For mobile devices
        document.execCommand('copy');

        alert('Link copied to clipboard');
    }
</script>
