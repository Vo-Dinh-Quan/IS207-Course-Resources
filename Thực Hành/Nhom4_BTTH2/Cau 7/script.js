$(document).ready(function () {
    let avatarURL = '';

    $('#avatar').change(function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                avatarURL = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    $('#addSkill').click(function (e) {
        e.preventDefault();
        $('#skillsContainer').append(`
            <div class="skill">
                <input type="text" class="skill-name" placeholder="Tên kỹ năng">
                <input type="range" class="skill-level" min="0" max="100" step="10" value="0">
            </div>
        `);
    });

    $('#registerBtn').click(function () {
        const name = $('#name').val();
        const address = $('#address').val();
        const phone = $('#phone').val();
        const email = $('#email').val();
        const job = $('#job').val();
        const skills = [];

        $('#skillsContainer .skill').each(function () {
            const skillName = $(this).find('.skill-name').val();
            const skillLevel = $(this).find('.skill-level').val();
            if (skillName) {
                skills.push({ name: skillName, level: skillLevel });
            }
        });

        let skillsContent = skills.map(skill => `
            <div class="skill-display">
                <span>${skill.name}</span>
                <div class="progress">
                    <div class="progress-bar" style="width: ${skill.level}%;"></div>
                </div>
                <span>${skill.level}%</span>
            </div>
        `).join('');

        let cvContent = `
            <style>
                body { font-family: Arial, sans-serif; text-align: center; }
                .cv-info { width: 300px; margin: auto; text-align: left; }
                .cv-info img { width: 100%; border-radius: 50%; }
                .cv-info .name { font-size: 24px; font-weight: bold; margin-top: 10px; }
                .cv-info .icon { color: #4CAF50; margin-right: 8px; }
                .skill-display { display: flex; justify-content: space-between; align-items: center; margin-top: 10px; }
                .progress { width: 60%; background-color: #ddd; border-radius: 5px; margin: 0 10px; }
                .progress-bar { height: 10px; background-color: #4CAF50; border-radius: 5px; }
            </style>
            <div class="cv-info">
                <img src="${avatarURL || 'https://via.placeholder.com/150'}" alt="Ảnh đại diện">
                <p class="name">${name}</p>
                <p><i class="fas fa-briefcase icon"></i> ${job}</p>
                <p><i class="fas fa-home icon"></i> ${address}</p>
                <p><i class="fas fa-envelope icon"></i> ${email}</p>
                <p><i class="fas fa-phone icon"></i> ${phone}</p>
                <hr>
                <h3>Kỹ năng</h3>
                ${skillsContent}
            </div>
        `;

        const newWindow = window.open("", "_blank");
        newWindow.document.write(cvContent);
        newWindow.document.close();
    });
});
