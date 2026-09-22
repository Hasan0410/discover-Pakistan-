from django.shortcuts import render, get_object_or_404
from .models import BlogPost, Category


def blog_list_view(request):
    posts = BlogPost.objects.filter(is_published=True).order_by('-published_at')
    categories = Category.objects.all()
    return render(request, 'blog/list.html', {'posts': posts, 'categories': categories})


def blog_detail_view(request, slug):
    post = get_object_or_404(BlogPost, slug=slug, is_published=True)
    return render(request, 'blog/detail.html', {'post': post})
