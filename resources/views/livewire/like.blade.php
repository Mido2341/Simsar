<span class="inline-flex items-center">
  <button wire:click="like" class="inline-flex space-x-2 btn {{ $comment->isLiked() ? 'btn-success' : 'btn-primary' }} focus:outline-none focus:ring-0">

    <i class="fas fa-thumbs-up"></i>
    <span class="font-medium text-gray-900">{{ $count }}</span>
    <span class="sr-only">likes</span>
  </button>
</span>
