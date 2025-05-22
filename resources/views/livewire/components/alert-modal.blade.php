<div x-data="{ timer: null }"
     x-init="$wire.on('showAlert', () => {
         clearTimeout(timer);
         timer = setTimeout(() => $wire.close(), 5000);
     })"
     class="fixed inset-0 z-50 flex items-center justify-center p-4"
     x-show="$wire.show"
     x-transition:enter="ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     style="display: none;">

    <!-- Fundo escuro -->
    <div class="fixed inset-0 bg-black bg-opacity-50" @click="$wire.close()"></div>

    <!-- Modal -->
    <div class="relative w-full max-w-md rounded-lg shadow-xl"
         x-show="$wire.show"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">

        <!-- Cabeçalho -->
        <div class="flex items-start justify-between p-4 border-b rounded-t-lg"
             :class="{
                 'bg-verde-bandeira border-verde-bandeira': $wire.type === 'success',
                 'bg-vermelho-vivo border-vermelho-vivo': $wire.type === 'error'
             }">
            <h3 class="text-xl font-semibold text-white">
                {{ $this->title }}
            </h3>
            <button @click="$wire.close()" class="text-white hover:text-gray-300">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

<!-- Corpo -->
<div class="p-6 space-y-4 bg-white">
    <div class="flex items-center space-x-3">
        <!-- Animação -->
        <div class="flex-shrink-0 p-2 rounded-full"
             :class="{
                 'bg-green-300 text-verde-folha': $wire.type === 'success',
                 'bg-red-300 text-white': $wire.type === 'error'
             }">

            <!-- Aqui entra o Lottie -->
<div
    x-ref="lottieIcon"
    class="w-14 h-14"
    x-effect="
        if ($wire.show) {
            $refs.lottieIcon.innerHTML = ''; // Remove o anterior

            lottie.loadAnimation({
                container: $refs.lottieIcon,
                renderer: 'svg',
                loop: false,
                autoplay: true,
                path: $wire.type === 'success'
                    ? '/lottie/success.json'
                    : '/lottie/error.json'
            });
        }
    ">
</div>


        </div>

        <!-- Mensagem -->
        <p class="text-cinza-medio">{{ $this->message }}</p>
    </div>
</div>


        <!-- Rodapé -->
        <div class="flex items-center justify-end p-4 space-x-3 border-t rounded-b-lg bg-cinza-claro">
            <button @click="$wire.close()"
                    class="px-4 py-2 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                    :class="{
                        'text-verde-folha hover:bg-azul-claro focus:ring-verde-bandeira': $wire.type === 'success',
                        'text-vermelho-vivo hover:bg-vermelho-suave hover:text-white focus:ring-vermelho-vivo': $wire.type === 'error'
                    }">
                Fechar
            </button>
        </div>
    </div>
</div>
