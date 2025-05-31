/* js/script.js - الوظائف */
document.addEventListener('DOMContentLoaded', function() {
    // التحقق من صحة النموذج قبل الإرسال
    const reviewForm = document.getElementById('reviewForm');
    
    if (reviewForm) {
        reviewForm.addEventListener('submit', function(e) {
            const username = document.getElementById('username').value.trim();
            const comment = document.getElementById('comment').value.trim();
            const rating = document.querySelector('input[name="rating"]:checked');
            
            if (!username || !comment || !rating) {
                e.preventDefault();
                alert('الرجاء ملء جميع الحقول وتحديد تقييم بالنجوم.');
            }
        });
    }
    
    // تأثير على النجوم عند التحويم
    const ratingLabels = document.querySelectorAll('.rating label');
    ratingLabels.forEach(label => {
        label.addEventListener('mouseover', function() {
            // إضافة تأثير عند التحويم
        });
        
        label.addEventListener('mouseout', function() {
            // إزالة التأثير عند الخروج
        });
    });
    
    // تمرير سلس لقسم التعليقات
    const reviewsList = document.getElementById('reviewsList');
    if (reviewsList) {
        // تحديث قائمة التعليقات تلقائيًا كل 60 ثانية
        setInterval(function() {
            fetch('reviews.php')
                .then(response => response.text())
                .then(data => {
                    reviewsList.innerHTML = data;
                })
                .catch(error => console.error('خطأ في تحديث التعليقات:', error));
        }, 60000);
    }
});