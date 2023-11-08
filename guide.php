<?php
$title = "Guide";
include('includes/header.php');
include('includes/db.php');
include('includes/navbar.php')


?>

<div class="container mt-5 mb-5">
  <div>
    <ol style="list-style: none;">
      <li>
        <h4 style="color:#C21010;">1. Choose the Right Format:</h4>
        <ul style="line-height: 25px; " type="disc">
          <li class="mt-2">Decide whether you want to create a CV or a resume. A CV is typically longer and more detailed, while a resume is shorter and focused on specific qualifications and work experience.</li>
          <li class="mt-2">Use a clean, professional format with consistent fonts and formatting throughout.</li>
        </ul>
      </li>
      <li class="mt-5">
        <h4 style="color:#C21010;">2. Contact Information:</h4>
        <ul style="line-height: 25px;" type="disc">
          <li class="mt-2">Include your full name, phone number, email address, and LinkedIn profile (if applicable).</li>
          <li class="mt-2">You don't need to include your full address, but you can include your city and state.</li>
        </ul>
      </li>
      <li class="mt-5">
        <h4 style="color:#C21010;">3. Summary or Objective (Optional):</h4>
        <ul style="line-height: 25px;" type="disc">
          <li class="mt-2">Write a brief, targeted summary or objective statement to introduce yourself and state your career goals. This can be especially useful for recent graduates or career changers.</li>
        </ul>
      </li>
      <li class="mt-5">
        <h4 style="color:#C21010;">4. Professional Experience:</h4>
        <ul style="line-height: 25px;" type="disc">
          <li class="mt-2">List your work experience in reverse chronological order (most recent job first).</li>
          <li class="mt-2">Include the name of the company, your job title, the dates you worked there, and a description of your key responsibilities and achievements.</li>
          <li class="mt-2">Use action verbs and quantify your achievements with specific numbers (e.g., "increased sales by 20%").</li>
        </ul>
      </li>
      <li class="mt-5">
        <h4 style="color:#C21010;">5. Education:</h4>
        <ul style="line-height: 25px;" type="disc">
          <li class="mt-2">List your educational background, starting with your most recent degree.</li>
          <li class="mt-2">Include the name of the institution, degree earned, graduation date, and any relevant honors or awards.</li>
          <li class="mt-2">You can include your GPA if it's strong and relevant to the job.</li>
        </ul>
      </li>
      <li class="mt-5">
        <h4 style="color:#C21010;">6. Skills:</h4>
        <ul style="line-height: 25px;" type="disc">
          <li class="mt-2">Include a section that highlights your key skills, both technical and soft skills.</li>
          <li class="mt-2">Tailor this section to match the job requirements.</li>
          <li class="mt-2">You can include your GPA if it's strong and relevant to the job.</li>
        </ul>
      </li>
      <li class="mt-5">
        <h4 style="color:#C21010;">7. Certifications, Training, and Professional Memberships (Optional):</h4>
        <ul style="line-height: 25px;" type="disc">
          <li class="mt-2">If you have certifications, relevant training, or memberships in professional organizations, include them in a separate section.</li>

        </ul>
      </li>
    </ol>
  </div>
</div>


<?php
include('includes/footer.php');
include('includes/end_links.php')


?>