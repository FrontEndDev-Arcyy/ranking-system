<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/hometest.css')}}">
    <title>FSUU Ranking System</title>
</head>
<body>
  <div class="header">
  <h1>SY 2024-2025 Academic Ranking</h1>
  </div>
  
  <div class="content-header">
  <h2>Name</h2>
  <h2>Date Hired</h2>
  <h2>Office</h2>
  </div>
  
  <div class="first-table"><table class="instruction">Based on ranks and control:
  <tr>
    <th>Present Rank</th>
    <th>Next Rank</th>
    <th>Requirements</th>
  </tr>
  <tr>
    <td>Teacher 1</td>
    <td>Teacher 2</td>
    <td>Must have earned 25% of MA academic requirements on his/her specialization; Must have a Very Good/Very Satisfactory efficieny rating; At least three (3) years teaching experience.</td>
  </tr>
</table></div>
  
  <div class="AAG">
    <h2>A. Academic Attainment and Growth</h2>
    <h3></h3>
  </div>

  <div class="perform-content">
    <h2>B. Performance (35 points)</h2>
    <table class="performance-table">
      <tr>
        <th>Points</th>
      </tr>
      <tr>
        <td><input type="number" id="quantity" name="quantity" min="1" max="35"></td>
      </tr>
    </table>
  </div>



  <div class="PS-content">
  <h2>C. Productive Scholarship (15 points)</h2>
  <form action="{{ route('calculate.total') }}" method="POST">
    @csrf
    <table class="PS-table-seminar">
        <tr>
            <th>Documents</th>
            <th>Topic</th>
            <th>No. of days</th>
            <th>Inclusive Dates</th>
            <th>Points</th>
        </tr>
        @for ($i = 0; $i < 3; $i++)
            <tr>
                <td>
                    <select name="entries[{{ $i }}][doc_type]">
                        <option value="certificate">Certificate</option>
                        <option value="other">Other</option>
                    </select>
                </td>
                <td><input type="text" name="entries[{{ $i }}][topic]"></td>
                <td>
                    <input type="number" name="entries[{{ $i }}][days]" min="1" max="15" step="1">
                </td>
                <td><input type="date" name="entries[{{ $i }}][inclusive_date]"></td>
                <td><input type="number" name="entries[{{ $i }}][points]" min="0" max="31" step="0.1" class="points-input"></td>
            </tr>
        @endfor
        <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td></td>
            <td id="total-points">{{ $total ?? '0.0' }}</td>
        </tr>
    </table>
</form>
  </div>



  <div>
    <form action="">
    <table class="PS-table-HA">C.2 Honors and Awards
      <tr>
        <th>Documents</th>
        <th>Title</th>
        <th>Sponsor</th>
        <th>Points</th>
      </tr>
      <tr>
        <td><select name="doc-type" id="doc-type">
          <option value="certificate">Certificate</option>
          <option value="other">Other</option>
          </select>
        </td>
        <td><input type="text" id="title" name="title"></td>
        <td><input type="text" id="sponsor" name="sponsor"></td>
        <td><input type="number" id="quantity" name="quantity" min="1" max="15"></td>
      </tr>
      <tr>
        <td>Sub-total</td>
        <td colspan="2"></td>
        <td>0.0</td>
      </tr>
    </table>
    </form>
  </div>


  <div>
    <table class="PS-table-Mem">C.3 Membership
      <tr>
        <th>Documents</th>
        <th>Organization (s)</th>
        <th>Designation</th>
        <th>Points</th>
      </tr>
      <tr>
        <td><select name="doc-type" id="doc-type">
          <option value="certificate">Certificate</option>
          <option value="other">Other</option>
          </select>
        </td>
        <td><input type="text" id="organizations" name="organizations"></td>
        <td><input type="text" id="designation" name="designation"></td>
        <td><input type="number" id="quantity" name="quantity" min="1" max="15"></td>
      </tr>
      <tr>
        <td>Sub-total</td>
        <td colspan="2"></td>
        <td></td>
      </tr>
    </table>
  </div>


  <div>
    <table class="PS-table-SACE">C.4 Scholarship Activities and Creative Efforts
    <tr>
      <th>Documents</th>
      <th>Title/Topic/Activity</th>
      <th>Designation/Role</th>
      <th>Inclusive Date</th>
      <th>Points</th>
    </tr>
    <tr>
      <td><select name="doc-type" id="doc-type">
          <option value="certificate">Certificate</option>
          <option value="other">Other</option>
          </select>
      </td>
      <td><input type="text" id="title" name="title"></td>
      <td><input type="text" id="designation" name="designation"></td>
      <td><input type="date" id="inclusive-date" name="inclusive-date"></td>
      <td><input type="number" id="quantity" name="quantity" min="1" max="15"></td>
    </tr>
    <tr>
      <td>Total</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    </table>
  </div>

  <div class="distribution-content">
    <h2>Distribution of Points on Prodcutive Scholarship & Creative Efforts based on Rank</h2>
    <h3>Rank (based on the Ranks and Control): teacher rank here</h3>
    <table class="R-C">
      <tr>
        <th rowspan="2">Ranking Criteria</th>
        <th>Group A</th>
        <th>Group B</th>
      </tr>
      <tr>
        <td>Seminar, Membership, ....</td>
        <td>Honors and Awards, .....</td>
      </tr>
      <tr>
        <td>% distribution based on Rank</td>
        <td>80</td>
        <td>20</td>
      </tr>
      <tr>
        <td>Maximum Points Each Group</td>
        <td>12.0</td>
        <td>3.0</td>
      </tr>
      <tr>
        <td>Total Points</td>
        <td>15.0</td>
        <td></td>
      </tr>
    </table>
  </div>

  <div>
    <table class="C-Gs">
      <tr>
        <th>Criiteria-Group A</th>
        <th>Points</th>
        <th>Criteria-Group B</th>
        <th>points</th>
      </tr>
      <tr>
        <td>Seminars</td>
        <td>0</td>
        <td>Honors and Awards</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Membership</td>
        <td>0</td>
        <td>Researcher</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Adviser-Dissertation Thesis</td>
        <td>0</td>
        <td>Speakers/Coach</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Panelist</td>
        <td>0</td>
        <td>Consultant</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Author-workbook</td>
        <td>Points</td>
        <td>Trainer</td>
        <td>0</td>
      </tr>
      <tr>
        <td></td>
        <td>0</td>
        <td>Author-Book</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Sub-total</td>
        <td>0</td>
        <td>Sub-total</td>
        <td>0</td>
      </tr>
      <tr>
        <td>% distribution</td>
        <td>00</td>
        <td>% distribution</td>
        <td>00</td>
      </tr>
      <tr>
        <td>Points Earned</td>
        <td>0</td>
        <td>Points Earned</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Points Credited</td>
        <td>0</td>
        <td>Points Credited</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Total Poits Credited</td>
        <td>0</td>
      </tr>
    </table>
  </div>

  <div class="YoE-content">
    <h2>D. Years of Experience (FSUU) (10 points)</h2>
    <table class="YoE-table">
      <tr>
        <th>Years of Experience</th>
        <th>Points (10)</th>
      </tr>
      <tr>
        <td>0 years</td>
        <td>0.0</td>
      </tr>
    </table>
  </div>

  <div class="CE-content">
    <h2>COMMUNITY EXTENSION (10 points)</h2>
    <h3>E.1 ON CAMPUS-ACTIVITIES</h3>
    <table class="StS-table">E.1.A Services to Students
      <tr>
        <th>Documents</th>
        <th>Description</th>
        <th>Sponsor/Source</th>
        <th>Points</th>
      </tr>
      <tr>
        <td>cert here</td>
        <td>desc here</td>
        <td>sponsor here</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Sub-Total</td>
        <td></td>
        <td></td>
        <td>0.0</td>
      </tr>
    </table>
  </div>

  <div>
    <table class="SD-table">E.1.B Service to the Department
      <tr>
        <th>Documents</th>
        <th>Description</th>
        <th>Sponsor/Source</th>
        <th>Points</th>
      </tr>
      <tr>
        <td>cert here</td>
        <td>desc here</td>
        <td>sponsor here</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Sub-Total</td>
        <td></td>
        <td></td>
        <td>0.0</td>
      </tr>
    </table>
  </div>

  <div>
    <table class="SI-table">E.1.C Service to Institution
      <tr>
        <th>Documents</th>
        <th>Description</th>
        <th>Sponsor/Source</th>
        <th>Inclusive Dates</th>
        <th>Points</th>
      </tr>
      <tr>
        <td>cert</td>
        <td>desc here</td>
        <td>sponsor here</td>
        <td>date here</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Sub-total</td>
        <td></td>
        <td></td>
        <td></td>
        <td>0</td>
      </tr>
    </table>
  </div>

  <div class="OCA-content">
    <h2>OFF CAMPUS ACTIVITIES</h2>
    <table class="AP-table">E.2.A Active Participation in different organizations
      <tr>
        <th>Documents</th>
        <th>Description</th>
        <th>Sponsor/Source</th>
        <th>Inclusive Dates</th>
        <th>Points</th>
      </tr>
      <tr>
        <td>cert</td>
        <td>desc here</td>
        <td>sponsor here</td>
        <td>date here</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Sub-total</td>
        <td>0</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
  </div>

  <div>
    <table class="AI-table">E.2.B Active Involvement in Department/School sponsored CES
      <tr>
        <th>Documents</th>
        <th>Description</th>
        <th>Sponsor/Source</th>
        <th>Inclusive Dates</th>
        <th>Points</th>
      </tr>
      <tr>
        <td>cert</td>
        <td>desc here</td>
        <td>sponsor here</td>
        <td>date here</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Sub-total</td>
        <td>0</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
  </div>

  <div class="DPCE-service-content">
    <h2>Distribution of Points on Community Extension Service based on Rank</h2>
    <h3>Rank (based on the Ranks and Control): teacher rank here</h3>
    <table class="DPCE-R-C-table">
      <tr>
        <th rowspan="2">Ranking Criteria</th>
        <th>Group A</th>
        <th>Group B</th>
      </tr>
      <tr>
        <td>On-Campus Act</td>
        <td>Off-Campus Act</td>
      </tr>
      <tr>
        <td>% distribution based on Rank</td>
        <td>80</td>
        <td>20</td>
      </tr>
      <tr>
        <td>Maximum Points Each Group</td>
        <td>12.0</td>
        <td>3.0</td>
      </tr>
      <tr>
        <td>Total Points</td>
        <td colspan="2">15.0</td>
      </tr>
    </table>
  </div>

  <div>
    <table class="DPCE-R-C-table-2">
      <tr>
        <th>Criiteria-Group A</th>
        <th>Points</th>
        <th>Criteria-Group B</th>
        <th>points</th>
      </tr>
      <tr>
        <td>E.1 On Campus Activites</td>
        <td>0</td>
        <td>E.2 Off Campus Acitivites</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Service to Students</td>
        <td>0</td>
        <td>Active Participation in different organizations</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Servive to department</td>
        <td>0</td>
        <td>Active involvement in department/school sponsored CES</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Service to instituion</td>
        <td>0</td>
        <td></td>
        <td>0</td>
      </tr>
      <tr>
        <td>Sub-total</td>
        <td>0</td>
        <td>Sub-total</td>
        <td>0</td>
      </tr>
      <tr>
        <td>% distribution</td>
        <td>00</td>
        <td>% distribution</td>
        <td>00</td>
      </tr>
      <tr>
        <td>Points Earned</td>
        <td>0</td>
        <td>Points Earned</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Points Credited</td>
        <td>0</td>
        <td>Points Credited</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Total Poits Credited</td>
        <td colspan="3">0</td>
      </tr>
    </table>
  </div>
  <div class="done-btn">
    <a href="{{ url('/summary')}}"><button id="button">Done</button></a>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
    const pointsInputs = document.querySelectorAll('.points-input');
    const totalElement = document.getElementById('total-points');

    function calculateTotal() {
        let total = 0;
        pointsInputs.forEach(input => {
            total += parseFloat(input.value) || 0;
        });
        totalElement.textContent = total.toFixed(1);
    }

    pointsInputs.forEach(input => {
        input.addEventListener('input', calculateTotal);
    });
});
  </script>
</body>
</html>