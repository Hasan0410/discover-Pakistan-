from django.shortcuts import render, redirect, get_object_or_404
from django.contrib.auth.decorators import login_required
from django.contrib import messages
from .models import Review


def review_list_view(request):
    reviews = Review.objects.filter(is_approved=True).order_by('-created_at')
    return render(request, 'reviews/list.html', {'reviews': reviews})


@login_required
def review_create_view(request):
    if request.method == 'POST':
        title = request.POST.get('title')
        comment = request.POST.get('comment')
        rating = int(request.POST.get('rating', 5))
        
        Review.objects.create(
            user=request.user,
            title=title,
            comment=comment,
            rating=rating
        )
        messages.success(request, "Thank you! Your review has been submitted.")
        return redirect('reviews:list')

    return render(request, 'reviews/create.html')
