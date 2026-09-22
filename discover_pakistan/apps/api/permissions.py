from rest_framework.permissions import BasePermission
from rest_framework.permissions import SAFE_METHODS


class IsOwnerOrStaff(BasePermission):
    def has_object_permission(self, request, view, obj):
        if request.method in SAFE_METHODS:
            return True
        if request.user.is_staff:
            return True
        owner = getattr(obj, 'user', None)
        return bool(request.user.is_authenticated and owner == request.user)
