<?php include 'header.php'; ?>

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-center mb-8">ChatGPT API Tester</h1>
    
    <form id="apiTestForm" class="space-y-6">
        <div>
            <label for="api_key" class="block text-sm font-medium text-gray-700">Enter your OpenAI API Key</label>
            <input type="password" id="api_key" name="api_key" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div>
            <button type="submit" 
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Test API
            </button>
        </div>
    </form>

    <div id="result" class="mt-6 hidden">
        <div class="p-4 rounded-md">
            <h3 class="text-lg font-medium"></h3>
            <p class="mt-2 text-sm"></p>
        </div>
    </div>
</div>

<script>
document.getElementById('apiTestForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const apiKey = document.getElementById('api_key').value;
    const resultDiv = document.getElementById('result');
    const resultTitle = resultDiv.querySelector('h3');
    const resultMessage = resultDiv.querySelector('p');

    try {
        const response = await fetch('api_test.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `api_key=${encodeURIComponent(apiKey)}`
        });

        const data = await response.json();
        
        resultDiv.className = `mt-6 p-4 rounded-md ${data.success ? 'bg-green-100' : 'bg-red-100'}`;
        resultTitle.className = `text-lg font-medium ${data.success ? 'text-green-800' : 'text-red-800'}`;
        resultTitle.textContent = data.success ? 'Success!' : 'Error';
        resultMessage.className = `mt-2 text-sm ${data.success ? 'text-green-600' : 'text-red-600'}`;
        resultMessage.textContent = data.message;
        resultDiv.classList.remove('hidden');
    } catch (error) {
        resultDiv.className = 'mt-6 p-4 rounded-md bg-red-100';
        resultTitle.className = 'text-lg font-medium text-red-800';
        resultTitle.textContent = 'Error';
        resultMessage.className = 'mt-2 text-sm text-red-600';
        resultMessage.textContent = 'An error occurred while testing the API.';
        resultDiv.classList.remove('hidden');
    }
});
</script>

<?php include 'footer.php'; ?>
